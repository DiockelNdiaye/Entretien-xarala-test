<?php

use App\Http\Controllers\C_User;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [C_User::class, 'show'])->name('lister.client');// lister les enregistrement

Route::get('/ajouter-client', [C_User::class, 'create'])->name('ajout.client'); //Revoie formumaire
Route::get('/ajouter-client', [C_User::class, 'create'])->name('ajout.client'); //Revoie formumaire
Route::post('/creer-client', [C_User::class, 'store'])->name('creer.client'); //Envoie données en controller par action
Route::get('/lister-client', [C_User::class, 'show'])->name('lister.client');// lister les enregistrement
Route::get('/edit-client', [C_User::class,'edit']);//Permet de récuperer les données dans le formulaire
Route::put('/modifier-client/{id}', [C_User::class,'update']);//Permet de soumettre les données modifiées dans bd
Route::delete('/delete-client/{id}', [C_User::class,'Suppression']);