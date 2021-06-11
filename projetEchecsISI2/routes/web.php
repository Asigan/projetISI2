<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\TournoiController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\PartieController;

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
    return view('welcome');
});

Route::get('index', function () {
    return view('index');
});

Route::get('joueurs',[JoueurController::class, 'index']);
Route::resource('joueurs',JoueurController::class);

Route::get('tournois',[TournoiController::class, 'index']);
Route::resource('tournois',TournoiController::class);

Route::get('niveaux',[NiveauController::class, 'index']);

Route::get('organisateurs',[OrganisateurController::class, 'index']);
Route::resource('organisateurs',OrganisateurController::class);

Route::get('parties',[PartieController::class, 'index']);
Route::resource('parties',PartieController::class);