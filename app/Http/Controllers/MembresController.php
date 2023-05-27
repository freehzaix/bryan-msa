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
            $colonnes = Colonne::all();
            return view('/espace-membre', compact('membres', 'colonnes'));
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
            'email' => 'required|email',
            'motdepasse' => 'required',
        ]);

        $membre = Membre::where('email', $request->input('email'))->first();

        if ($membre) {
            if (Hash::check($request->input('motdepasse'), $membre->motdepasse)) {

                $request->session()->put('membre', $membre);

                return redirect('/espace-membre');
            } else {
                return back()->with('erreur-motdepasse', 'Votre mot de passe est incorrect.');
            }
        } else {
            return back()->with('erreur-email', 'Votre adresse mail est incorrect.');
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
            $membre->situation_matrimoniale = $request->input('situation_matrimoniale');
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
            
            // Enregistrer la nouvelle image
            if ($request->hasFile('image')) {

                $userId = $request->session()->get('membre')->id;
                $image = $request->file('image');
                $extension = 'jpg';
                $imageName = $userId . '.' . $extension;
                $path = $image->storeAs('images', $imageName, 'public');

            }

            $membre = new Membre();
            $membre->nom = $request->input('nom');
            $membre->prenom = $request->input('prenom');
            $membre->email = $request->input('email');
            $membre->telephone = $request->input('telephone');
            $membre->quartier = $request->input('quartier');
            $membre->colonne = $request->input('colonne');
            $membre->departement = $request->input('departement');
            $membre->image = $path;
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
            $colonnes = Colonne::all();
            $departements = Departement::all();
            return view('modifier-profil', compact('colonnes', 'departements'));
        }else{
            return redirect('/login');
        }
        
    }

    public function AfficherMembreColonne($id){
        
        $colonne = Colonne::where('id', $id)->get()->first();
        $departements = Departement::where('colonne_id', $id)->get();

        return view('membre-colonne', compact('departements', 'colonne'));

    }

    public function AfficherMembreDepartement($id){

        $departement = Departement::where('id', $id)->get()->first();
        $membres = Membre::where('departement', $id)->get();

        return view('membre-departement', compact('departement', 'membres'));

    }

    public function modifierProfilePost(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'quartier' => 'required',
            'telephone' => 'required',
            'colonne' => 'required',
            'departement' => 'required',
        ]);
        $membre = Membre::find($request->session()->get('membre')->id);
        $membre->nom = $request->nom;
        $membre->prenom = $request->prenom;
        $membre->quartier = $request->quartier;
        $membre->telephone = $request->telephone;
        $membre->colonne = $request->colonne;
        $membre->departement = $request->departement;
        $membre->situation_matrimoniale = $request->situation_matrimoniale;
        $membre->update();

        $request->session()->put('membre', $membre);

        return redirect('/modifier-profil')->with('status', 'Le profil a bien été modifié.');
    }

    //Modifier image profil
    public function modifier_image_profil(Request $request){
        $request->validate([
            'image' => 'required|image|nullable|max:1999'
        ]);
        
        if($request->session()->get('membre')->image){
            Storage::delete('public/images/' . $request->session()->get('membre')->image);
        }
        
        // Enregistrer la nouvelle image
        if ($request->hasFile('image')) {

            $userId = $request->session()->get('membre')->id;
            $image = $request->file('image');
            $extension = 'jpg';
            $imageName = $userId . '.' . $extension;
            $path = $image->storeAs('images', $imageName, 'public');

        }
        
        $membre = Membre::find($request->session()->get('membre')->id);
        $membre->image = $path;
        $membre->update();

        $request->session()->put('membre', $membre);

        return redirect('/modifier-profil')->with('status', 'Votre image a bien été modifié.');
    }

}
