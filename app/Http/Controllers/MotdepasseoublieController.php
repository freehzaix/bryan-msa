<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotdepasseoublieRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPasswordMail;
use App\Models\Membre;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class MotdepasseoublieController extends Controller
{
    //Traitement du formulaire "Mot de passe oublié"
    public function motdepasse_oublie(MotdepasseoublieRequest $request){

        $request->validated();

        $membre = Membre::where('email', $request->email)->get()->first();
        
        if($membre){
            Mail::to($request->email)->send(new ResetPasswordMail($membre));
            return redirect('/motdepasse_oublie')->with('status', 'Un mail vous a été envoyé par mail.');
        }else{
            return redirect('/motdepasse_oublie')->with('erreur', 'Vous n\'avez pas de compte avec cette adresse mail.');
        }
        
    }

    //Afficher le formulaire "Nouveau mot de passeé
    public function reset_password($id){
        $membre = Membre::find($id);
        return view('nouveau_motdepasse', compact('membre'));
    } 

    public function reset_password_post(ResetPasswordRequest $request){

        $request->validated();

        if($request->motdepasse == $request->motdepasse2){

            $m = Membre::find($request->id);
            $m->motdepasse = Hash::make($request->motdepasse);
            $m->update();

            return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé. Vous pouvez vous reconnecter.');

        }else{
            return redirect('/reset_password/'.$request->id)->with('error', 'Les deux mots de passe ne sont pas conforme.');
        }

    }

}
