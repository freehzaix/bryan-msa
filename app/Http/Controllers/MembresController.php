<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colonne;
use App\Models\Departement;
use App\Models\Membre;

class MembresController extends Controller
{

    public function form_login()
    {
        return view('login');
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
