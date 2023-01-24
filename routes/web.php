<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresController;
use App\Http\Controllers\ColonneController;
use App\Http\Controllers\DepartementController;
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

Route::get('/', function (Request $request) {

    if($request->session()->get('membre')){

        return redirect('/espace-membre');

    }else{

        return redirect('/login');

    }

});

Route::get('/espace-membre', [MembresController::class, 'espace_membre']);

Route::get('/logout', [MembresController::class, 'logout']);

Route::get('/login', [MembresController::class, 'form_login']);
Route::post('/login/traitement', [MembresController::class, 'login_traitement']);

Route::get('/register', [MembresController::class, 'form_register']);
Route::post('/register/traitement', [MembresController::class, 'register_traitement']);

Route::get('/colonne/add', [ColonneController::class, 'form_colonne']);
Route::post('/colonne/add/traitement', [ColonneController::class, 'traitement_colonne']);

Route::get('/departement/add', [DepartementController::class, 'form_departement']);
Route::post('/departement/add/traitement', [DepartementController::class, 'traitement_departement']);
