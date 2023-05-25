<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colonne;
use App\Models\Departement;
use App\Models\Membre;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MembresController extends Controller
{

    public function getData($id)
    {
        $data = Departement::where('colonne_id', $id)->get(); // Remplacez DropdownData par le nom de votre modèle et le champ à utiliser pour filtrer

        return response()->json($data);
    }

    public function espace_membre(Request $request)
    {
        if ($request->session()->get('membre')) {
            $membres = Membre::get();
            return view('/espace-membre', compact('membres'));
        } else {
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

        if ($membre) {
            if (Hash::check($request->input('motdepasse'), $membre->motdepasse)) {

                $request->session()->put('membre', $membre);

                return redirect('/espace-membre');
            } else {
                return back()->with('status', 'Identifiant ou mot de passe de connexion incorrect.');
            }
        } else {
            return back()->with('status', 'Désolé ! vous n\'avez pas de compte avec cet identifiant.');
        }
    }

    public function form_register()
    {
        $colonnes = Colonne::all();
        $departements = Departement::all();
        return view('register', compact('departements', 'colonnes'));
    }

    public function form_register_admin()
    {
        $colonnes = Colonne::all();
        $departements = Departement::all();
        return view('admin.membre.add', compact('departements', 'colonnes'));
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
            'image' => 'required|image|nullable|max:1999',
            'motdepasse' => 'required|min:5',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameTotore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/images/', $fileNameTotore);

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

            $request->session()->put('membre', $membre);

            return redirect('/espace-membre');
        }
    }

    public function register_traitement_admin(Request $request)
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

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameTotore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/images/', $fileNameTotore);

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

            return redirect('/admin/membre/add')->with('status', 'Le membre ' . $membre->prenom . ' a été ajouté avec succès.');
        }
    }

    public function list_membre()
    {
        $membres = Membre::all();
        return view('admin.membre.membres', compact('membres'));
    }

    public function update_membre($id)
    {
        $colonnes = Colonne::all();
        $departements = Departement::all();
        $membres = Membre::find($id);

        return view('admin.membre.update', compact('departements', 'colonnes', 'membres'));
    }

    public function update_membre_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'quartier' => 'required',
            'colonne' => 'required',
            'departement' => 'required',
            'motdepasse' => 'required|min:5',
        ]);

        $membre = Membre::find($request->input('id'));
        $membre->nom = $request->input('nom');
        $membre->prenom = $request->input('prenom');
        $membre->email = $request->input('email');
        $membre->telephone = $request->input('telephone');
        $membre->quartier = $request->input('quartier');
        $membre->colonne = $request->input('colonne');
        $membre->departement = $request->input('departement');
        $membre->motdepasse = bcrypt($request->input('motdepasse'));
        $membre->update();

        return redirect('/admin/membres')->with('status', 'Les informations sur ce membre a été modifié avec succès.');

    }

    public function delete_membre($id)
    {
        $membre = Membre::find($id);
        $membre->delete();

        Storage::delete('public/images/' . $membre->image);

        return redirect('/admin/membres')->with('status', 'Cet utilisateur a été supprimé avec succès.');
    }

    public function modifierProfile(Request $request){

        if ($request->session()->get('membre')){
            $colonne = Colonne::findOrFail($request->session()->get('membre')->colonne);
            $departement = Departement::findOrFail($request->session()->get('membre')->departement);
            return view('modifier-profil', compact('colonne', 'departement'));
        }else{
            return redirect('/login');
        }
        
    }

}
