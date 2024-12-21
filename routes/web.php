<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\CarburantController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\MotopropulseurController;
use Illuminate\Support\Facades\Route;
use App\Models\Voiture;



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
/* 
Route::get('/home', function () {
    $voitures = Voiture::with('modele.marque', 'photos')->orderBy('id', 'desc')->take(4)->get();
    return view('welcome', ['voitures' => $voitures]);
})->name('home');
 */

Route::get('/', function () {
    $voitures = Voiture::with('modele.marque', 'photos')->orderBy('id', 'desc')->take(4)->get();
    return view('welcome', ['voitures' => $voitures]);
})->name('home');

// filrage voitures
Route::post('/filtre/voitures', [VoitureController::class, 'filtrage'])->name('filtrage.voiture');
Route::get('/modeles/{marque_id}', [ModeleController::class, 'getModelesParId'])->name('getModels');

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');
    Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
    Route::post('/inscription', [UserController::class, 'store'])->name('user.store');
});

//Auth
Route::middleware('auth')->group(function () {
    
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

    //edit
    Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');

    //update
    Route::put('/edit/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.delete');

    //Commande
    Route::get('/commande/{total}', [CommandeController::class, 'create'])->name('commande.create');
    Route::post('/commande/{total}', [CommandeController::class, 'store'])->name('commande.store');
    Route::get('/liste-commandes', [CommandeController::class, 'index'])->name('commande.index')->middleware('can:edit-commande');
    Route::get('/commande-crm/{id}', [CommandeController::class, 'show'])->name('commande-crm.show')->middleware('can:edit-commande');
    Route::put('/valide-commande/{id}', [CommandeController::class, 'updateStatut'])->name('commande.updateStatut')->middleware('can:edit-commande');

    //Facture PDF
    Route::get('/facture-pdf/{commande}', [CommandeController::class, 'pdf'])->name('commande.pdf');
    Route::get('/commandes/filter', [CommandeController::class, 'filter'])->name('commandes.filter');

    //Paiement
    Route::get('/paiement/{commande}', [PaiementController::class, 'create'])->name('commande.payer');
    Route::post('/paiement/{commande}', [PaiementController::class, 'store'])->name('commande.payer');

    // stripe //nnxfohogsmf5rsytgvrhw4wb   : upss-xmay-codm-jclg-alid
    Route::get('/success/{commande_id}', [PaiementController::class, 'success'])->name('success');
    Route::get('/cancel', [PaiementController::class, 'cancel'])->name('cancel');

    // voiture-auth
    Route::get('/create/voiture', [VoitureController::class, 'create'])->name('create.voiture');
    Route::post('/store/voiture', [VoitureController::class, 'store'])->name('store.voiture');
    Route::get('/edit/voiture/{voiture}', [VoitureController::class, 'edit'])->name('edit.voiture');
    Route::put('/edit/voiture/{voiture}', [VoitureController::class, 'update'])->name('update.voiture');
    Route::delete('delete/voiture/{voiture}', [VoitureController::class, 'destroy'])->name('destroy.voiture');
    Route::get('/voiture/{voiture}', [VoitureController::class, 'show'])->name('show.voiture');
    Route::get('/listeVoitures', [VoitureController::class, 'crm'])->name('liste-crm.voiture');

    //Route photos
    Route::delete('delete/photo/{photo}', [PhotoController::class, 'destroy'])->name('destroy.photo');

    //Admin
    Route::get('/liste-utilisateurs', [UserController::class, 'index'])->name('users')->middleware('can:view-list-users');
    Route::put('/edit_role/{user}', [UserController::class, 'updateRole'])->name('user.editRole')->middleware('can:edit-role');
    Route::get('/search-utilisateur', [UserController::class, 'filtre'])->name('user.filtre')->middleware('can:view-list-users');

    // Routes pour gérer informations vehicules 
    Route::resource('marques', MarqueController::class)->middleware('can:crud-trsm-carb-model-marque-gp');
    Route::resource('modeles', ModeleController::class)->middleware('can:crud-trsm-carb-model-marque-gp');
    Route::resource('carburants', CarburantController::class)->middleware('can:crud-trsm-carb-model-marque-gp');
    Route::resource('transmissions', TransmissionController::class)->middleware('can:crud-trsm-carb-model-marque-gp');

    //routes marque 
    Route::get('/marques', [MarqueController::class, 'index'])->name('marque.index');
    Route::post('/store/marque', [MarqueController::class, 'store'])->name('marque.store');
    Route::get('/edit/marque/{marque}', [MarqueController::class, 'edit'])->name('marque.edit');
    Route::put('/update/marque/{marque}', [MarqueController::class, 'update'])->name('marque.update');
    Route::delete('delete/marque/{marque}', [MarqueController::class, 'destroy'])->name('marque.destroy');

    //routes modele
    Route::get('/modeles', [ModeleController::class, 'index'])->name('modele.index');
    Route::post('/store/modele', [ModeleController::class, 'store'])->name('modele.store');
    Route::get('/edit/modele/{modele}', [ModeleController::class, 'edit'])->name('modele.edit');
    Route::put('/update/modele/{modele}', [ModeleController::class, 'update'])->name('modele.update');
    Route::delete('delete/modele/{modele}', [ModeleController::class, 'destroy'])->name('modele.destroy');

    //routes carburant
    Route::get('/carburants', [CarburantController::class, 'index'])->name('carburant.index');
    Route::post('/store/carburant', [CarburantController::class, 'store'])->name('carburant.store');
    Route::get('/edit/carburant/{carburant}', [CarburantController::class, 'edit'])->name('carburant.edit');
    Route::put('/update/carburant/{carburant}', [CarburantController::class, 'update'])->name('carburant.update');
    Route::delete('delete/carburant/{carburant}', [CarburantController::class, 'destroy'])->name('carburant.destroy');

    //routes transmission
    Route::get('/transmission', [TransmissionController::class, 'index'])->name('transmission.index');
    Route::post('/store/transmission', [TransmissionController::class, 'store'])->name('transmission.store');
    Route::get('/edit/transmission/{transmission}', [TransmissionController::class, 'edit'])->name('transmission.edit');
    Route::put('/update/transmission/{transmission}', [TransmissionController::class, 'update'])->name('transmission.update');
    Route::delete('delete/transmission/{transmission}', [TransmissionController::class, 'destroy'])->name('transmission.destroy');

    //routes couleur
    Route::get('/couleur', [CouleurController::class, 'index'])->name('couleur.index');
    Route::post('/store/couleur', [CouleurController::class, 'store'])->name('couleur.store');
    Route::get('/edit/couleur/{couleur}', [CouleurController::class, 'edit'])->name('couleur.edit');
    Route::put('/update/couleur/{couleur}', [CouleurController::class, 'update'])->name('couleur.update');
    Route::delete('delete/couleur/{couleur}', [CouleurController::class, 'destroy'])->name('couleur.destroy');

    //routes motopropulseur
    Route::get('/motopropulseur', [MotopropulseurController::class, 'index'])->name('motopropulseur.index');
    Route::post('/store/motopropulseur', [MotopropulseurController::class, 'store'])->name('motopropulseur.store');
    Route::get('/edit/motopropulseur/{motopropulseur}', [MotopropulseurController::class, 'edit'])->name('motopropulseur.edit');
    Route::put('/update/motopropulseur/{motopropulseur}', [MotopropulseurController::class, 'update'])->name('motopropulseur.update');
    Route::delete('delete/motopropulseur/{motopropulseur}', [MotopropulseurController::class, 'destroy'])->name('motopropulseur.destroy');
});


//Voiture
Route::get('/voitures', [VoitureController::class, 'index'])->name('index.voiture');

//Route Lang
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

//Admin
Route::middleware('can:view-list-users')->group(function () {
    Route::get('/liste-utilisateurs', [UserController::class, 'index'])->name('users');
    Route::put('/edit_role/{user}', [UserController::class, 'updateRole'])->name('user.editRole');
    Route::get('/tableauDeBord', [AdminController::class, 'index'])->name('admin.tableauDeBord');
});


//Panier
Route::get('/ajout-panier/{id}', [PanierController::class, 'ajoutPanier'])->name('ajout.panier');
Route::get('/panier', [PanierController::class, 'showpanier'])->name('show.panier');
Route::get('/remove-from-panier/{id}', [PanierController::class, 'remove'])->name('remove.panier');