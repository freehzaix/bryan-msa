<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colonne;

class ColonneController extends Controller
{

    public function form_colonne()
    {
        return view('colonne.add');
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

        return redirect('/colonne/add')->with('status', 'Vous avez bien enregistré '. $colonne->colonne_code.' avec succes.');

    }



}
