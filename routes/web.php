<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresController;
use App\Http\Controllers\ColonneController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/storage-link', function(){

    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';

    symlink($targetFolder, $linkFolder);

});

Route::get('/', function (Request $request) {

    if($request->session()->get('membre')){

        return redirect('/espace-membre');

    }else{

        return view('/home');

    }

});

Route::get('/admin', function(Request $request){
    if($request->session()->get('admin')){
        return redirect('/espace-admin');
    }else{
        return redirect('/admin/login');
    }
});

Route::get('/admin/membres/delete/{id}', [MembresController::class, 'delete_membre']);
Route::get('/admin/membres/update/{id}', [MembresController::class, 'update_membre']);
Route::post('/admin/membres/update/traitement', [MembresController::class, 'update_membre_traitement']);

Route::get('/admin/profile', [AdminController::class, 'admin_profile']);
Route::post('/admin/profile/update', [AdminController::class, 'admin_profile_update'])->name('update_profile_admin');
Route::post('/admin/password/update', [AdminController::class, 'admin_password_update'])->name('update_password_admin');
Route::get('/admin/password', [AdminController::class, 'admin_password']);

Route::get('/espace-admin', [AdminController::class, 'espace_admin']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/login', [AdminController::class, 'form_admin_login']);
Route::get('/admin/register', [AdminController::class, 'form_admin_register'])->name('admin_register');
Route::post('/admin/register', [AdminController::class, 'form_admin_register_traitement'])->name('admin_register');
Route::post('/admin/login/traitement', [AdminController::class, 'form_admin_login_traitement']);

Route::get('/espace-membre', [MembresController::class, 'espace_membre'])->name('espace_membre');

Route::get('/logout', [MembresController::class, 'logout'])->name('logout');

Route::get('/login', [MembresController::class, 'form_login']);
Route::post('/login/traitement', [MembresController::class, 'login_traitement']);



Route::get('/register', [MembresController::class, 'form_register']);
Route::post('/register/traitement', [MembresController::class, 'register_traitement']);
Route::get('/admin/membre/add', [MembresController::class, 'form_register_admin']);
Route::post('/admin/membre/add/traitement', [MembresController::class, 'register_traitement_admin']);

Route::get('/admin/colonnes/delete/{id}', [ColonneController::class, 'delete_colonne']);
Route::post('/admin/colonnes/update/traitement', [ColonneController::class, 'update_colonne_traitement']);
Route::get('/admin/colonnes/update/{id}', [ColonneController::class, 'update_colonne']);
Route::get('/admin/colonnes', [ColonneController::class, 'list_colonne']);
Route::get('/admin/colonne/add', [ColonneController::class, 'form_colonne']);
Route::post('/admin/colonne/add/traitement', [ColonneController::class, 'traitement_colonne']);

Route::get('/admin/departements/delete/{id}', [DepartementController::class, 'delete_departement']);
Route::post('/admin/departements/update/traitement', [DepartementController::class, 'update_departement_traitement']);
Route::get('/admin/departements/update/{id}', [DepartementController::class, 'update_departement']);
Route::get('/admin/departements', [DepartementController::class, 'list_departement']);
Route::get('/admin/departement/add', [DepartementController::class, 'form_departement']);
Route::post('/admin/departement/add/traitement', [DepartementController::class, 'traitement_departement']);

Route::get('/admin/membres', [MembresController::class, 'list_membre']);

Route::get('register/{id}', [MembresController::class, 'getData']);
Route::get('modifier-profil/{id}', [MembresController::class, 'getData']);
Route::get('/modifier-profil', [MembresController::class, 'modifierProfile']);
Route::post('/modifier-profil', [MembresController::class, 'modifierProfilePost']);

Route::get('/espace-membre/colonne/{id}', [MembresController::class, 'AfficherMembreColonne']);
Route::get('/espace-membre/departement/{id}', [MembresController::class, 'AfficherMembreDepartement']);

Route::post('/modifier_image_profil', [MembresController::class, 'modifier_image_profil'])->name('modifier_image_profil');
