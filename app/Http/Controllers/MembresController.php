<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colonne;
use App\Models\Departement;
use App\Models\Membre;
use Illuminate\Support\Facades\Hash;



class MembresController extends Controller
{
    public function espace_membre(Request $request)
    {
        if($request->session()->get('membre')){
            $membres = Membre::get();
            return view('/espace-membre', compact('membres'));
        }else{
            return view('/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('membre');

        return redirect('/');
    }

    public function form_login()
    {
        return view('login');
    }

    public function login_traitement(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'motdepasse' => 'required',
        ]);

        $membre = Membre::where('email', $request->input('email'))->first();

        if($membre){
            if(Hash::check($request->input('motdepasse'), $membre->motdepasse)){

                $request->session()->put('membre', $membre);

                return redirect('/espace-membre');

            }else{
                return back()->with('status', 'Identifiant ou mot de passe de connexion incorrect.');
            }
        }else{
            return back()->with('status', 'Désolé ! vous n\'avez pas de compte avec cet identifiant.');
        }

    }

    public function form_register()
    {
        $colonnes = Colonne::all();
        $departements = Departement::all();
        return view('register', compact('departements', 'colonnes'));
    }

    public function register_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|unique:membres',
            'telephone' => 'required|unique:membres',
            'quartier' => 'required',
            'colonne' => 'required',
            'departement' => 'required',
            'image' => 'image|nullable|max:1999',
            'motdepasse' => 'required|min:5',
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameTotore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/images/', $fileNameTotore);

        }else{
            $fileNameTotore = 'no-image.png';
        }

        $membre = new Membre();
        $membre->nom = $request->input('nom');
        $membre->prenom = $request->input('prenom');
        $membre->email = $request->input('email');
        $membre->telephone = $request->input('telephone');
        $membre->quartier = $request->input('quartier');
        $membre->colonne = $request->input('colonne');
        $membre->departement = $request->input('departement');
        $membre->image = $fileNameTotore;
        $membre->motdepasse = bcrypt($request->input('motdepasse'));

        $membre->save();

        return redirect('/register')->with('status', 'Votre inscription a bien été enregistré avec success.');

    }

}
