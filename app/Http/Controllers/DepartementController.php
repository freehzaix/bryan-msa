<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Colonne;

class DepartementController extends Controller
{

    public function form_departement()
    {
        $colonnes = Colonne::all();
        return view('departement.add', compact('colonnes'));
    }

    public function traitement_departement(Request $request)
    {
        $request->validate([
            'departement_code' => 'required',
            'departement_name' => 'required',
            'colonne_id' => 'required',
        ]);

        $departement = new Departement();
        $departement->departement_code = $request->input('departement_code');
        $departement->departement_name = $request->input('departement_name');
        $departement->colonne_id = $request->input('colonne_id');
        $departement->save();

        return redirect('/departement/add')->with('status', 'Vous avez bien enregistré '. $departement->departement_code.' avec succes.');

    }
}
