<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function form_admin_login(){
        return view('admin.login');
    }

    public function form_admin_register(){
        return view('admin.register');
    }

    public function form_admin_register_traitement(Request $request){

        $request->validate([
            'email' => 'required|unique:admins',
            'nom' => 'required',
            'prenom' => 'required',
            'password' => 'required|min:5',
            'image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameTotore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/images_admin/', $fileNameTotore);

        }else{
            $fileNameTotore = 'no-image.png';
        }

        $admin = new Admin();
        $admin->email = $request->email;
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->image = $fileNameTotore;
        $admin->password = bcrypt($request->password);

        $admin->save();

        $request->session()->put('admin', $admin);

        return redirect('/espace-admin');

    }

    public function form_admin_login_traitement(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->input('email'))->first();

        if($admin){
            if(Hash::check($request->input('password'), $admin->password)){

                $request->session()->put('admin', $admin);

                return redirect('/espace-admin');

            }else{
                return back()->with('status', 'Identifiant ou mot de passe de connexion incorrect.');
            }
        }else{
            return back()->with('status', 'Désolé ! vous n\'avez pas de compte avec cet identifiant.');
        }
    }

    public function espace_admin(Request $request){
        if($request->session()->get('admin')){
            return view('admin.espace-admin');
        }else{
            return redirect('/admin/login');
        }
    }

    public function logout(Request $request){

        $request->session()->forget('admin');

        return redirect('/admin/login');
    }

    public function admin_profile(){
        return view('admin.admin-profile');
    }

    public function admin_profile_update(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        $admin = Admin::find($request->id);
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->update();

        $request->session()->put('admin', $admin);

        return redirect('/admin/profile')->with('status', 'Votre profile a été mise à jour avec succes.');

    }

    public function admin_password(){
        return view('admin.admin-password');
    }

    public function admin_password_update(Request $request){
        $request->validate([
            'password' => 'nullable|required_with:password_confirmation|string|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $admin = Admin::find($request->id);
        $admin->password = bcrypt($request->password);
        $admin->update();

        $request->session()->put('admin', $admin);

        return redirect('/admin/password')->with('status', 'Votre mot de passe a été mise à jour avec succes.');
        
    }

}
