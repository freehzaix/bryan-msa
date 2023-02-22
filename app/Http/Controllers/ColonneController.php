<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colonne;

class ColonneController extends Controller
{

    public function form_colonne()
    {
        return view('admin.colonne.add');
    }

    public function traitement_colonne(Request $request)
    {
        $request->validate([
            'colonne_code' => 'required',
            'colonne_name' => 'required',
        ]);

        $colonne = new Colonne();
        $colonne->colonne_code = $request->input('colonne_code');
        $colonne->colonne_name = $request->input('colonne_name');
        $colonne->save();

        return redirect('/admin/colonne/add')->with('status', 'Vous avez bien enregistré '. $colonne->colonne_code.' avec succes.');

    }

    public function list_colonne(){
        $colonnes = Colonne::paginate(10);
        return view('admin.colonne.colonnes', compact('colonnes'));
    }

    public function update_colonne($id){
        $colonnes = Colonne::find($id);
        return view('admin.colonne.update', compact('colonnes'));
    }

    public function update_colonne_traitement(Request $request){
        $request->validate([
            "colonne_code" => "required",
            "colonne_name" => "required",
        ]);
        $colonne = Colonne::find($request->id);
        $colonne->colonne_code = $request->colonne_code;
        $colonne->colonne_name = $request->colonne_name;
        $colonne->update();
        return redirect('/admin/colonnes')->with('status', 'Vous avez bien modifié '. $colonne->colonne_code.' avec succes.');

    }

    public function delete_colonne($id){
        $colonne = Colonne::find($id);
        $colonne->delete();
        return redirect('/admin/colonnes')->with('status', 'Vous avez bien supprimé '. $colonne->colonne_code.' avec succes.');

    }

}
