<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Colonne;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{

    public function form_departement()
    {
        $colonnes = Colonne::all();
        return view('admin.departement.add', compact('colonnes'));
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

        return redirect('/admin/departement/add')->with('status', 'Vous avez bien enregistré '. $departement->departement_code.' avec succes.');

    }

    public function list_departement(){
        //$departements = Departement::all();
        //$departements = Departement::crossJoin('colonnes')->get();
        $departements = DB::table('departements')
            ->join('colonnes', 'colonnes.id', '=', 'departements.colonne_id')
            ->select('departements.*', 'colonnes.colonne_name')
            ->paginate(10);
        return view('admin.departement.departements', compact('departements'));
    }
}
