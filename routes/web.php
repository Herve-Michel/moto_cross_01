<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {           /*  get pour aller sur une autre page */
    return view('welcome');
});

Route::get(
    '/training',
    [TrainingController::class, 'index']
)->name('training.index');

Route::get(
    '/create-training',
    [TrainingController::class, 'create']
)->name('training.create');

Route::post(                /* post pour enregistrer des données */
    '/create-training',
    [TrainingController::class, 'store']
)->name('training.store');

/*   1 url (edit-trainée) nommée training.edit, 1 méthode edit, un contrôleur */
Route::get(                    /*    pour ouvrir la page contenant le formulaire qui va modifier l'item */
    '/edit-training/{id}',
    [TrainingController::class, 'edit']
)->name('training.edit');

Route::post(
    '/update-training/{id}',
    [TrainingController::class, 'update']
)->name('training.update');

Route::get(
    '/erase-training/{id}',
    [TrainingController::class, 'erase']
)->name('training.erase');
