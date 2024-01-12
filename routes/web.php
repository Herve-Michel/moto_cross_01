<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;

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

/*   1 url (edit-training) nommée training.edit, 1 méthode edit, un contrôleur */
Route::get(    /*    pour ouvrir la page contenant le formulaire qui va modifier l'item */
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

Route::get(
    '/home',
    function () {
        return view('dashboard');
    }
)->name('dashboard');

/*
mercredi 10 janv 24
*/

Route::post(
    '/weather',
    [
        WeatherController::class, 'index'
    ]
)->name('weather.index');


Route::get('/city_search', function () {
    return view('weather.city_search');
})->name('weather.city_search');

Route::post(
    '/city_list',
    [
        WeatherController::class, 'search'
    ]
)->name('weather.city_list');

Route::get('/main', function () {
    return view('layouts.main');
});


/*
jeudi 11 janv 24
*/

Route::get(
    '/liste_u',
    [UserController::class, 'list_all']
)->name('lister_les_utilisateurs');

Route::get(
    '/image_ajout/{id}',
    [UserController::class, 'displayForm']
)->name('ajout_dune_image');

Route::get(
    '/liste_u',
    [UserController::class, 'list_all']
)->name('lister_les_utilisateurs');

Route::post(
    '/compresser_im',
    [UserController::class, 'storeImage']
)->name('compresser_image');

/*
vendredi 12 janv 24
*/

Route::get(
    '/liste_des_creneaux',
    [ScheduleController::class, 'index']
)->name('lister_les_creneaux');

Route::get(
    '/modification_dun_creneau/{id}',
    [ScheduleController::class, 'edit']
)->name('modifier_un_creneau');

Route::post(
    '/mise_a_jour_dun_creneau/{id}',
    [ScheduleController::class, 'update']
)->name('mettre_a_jour_un_creneau_modifie');

Route::get(
    '/suppression_dun_creneau/{id}',
    [ScheduleController::class, 'destroy']
)->name('supprimer_un_creneau');

Route::get(
    '/creation_dun_creneau',
    [ScheduleController::class, 'create']
)->name('creer_un_creneau');

Route::post(
    '/enregistrement_dun_creneau',
    [ScheduleController::class, 'store']
)->name('enregistrer_un_creneau');
