<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresController;
use App\Http\Controllers\ColonneController;
use App\Http\Controllers\DepartementController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [MembresController::class, 'form_login']);

Route::get('/register', [MembresController::class, 'form_register']);
Route::post('/register/traitement', [MembresController::class, 'register_traitement']);

Route::get('/colonne/add', [ColonneController::class, 'form_colonne']);
Route::post('/colonne/add/traitement', [ColonneController::class, 'traitement_colonne']);

Route::get('/departement/add', [DepartementController::class, 'form_departement']);
Route::post('/departement/add/traitement', [DepartementController::class, 'traitement_departement']);
