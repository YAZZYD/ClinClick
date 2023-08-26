<?php

use App\Http\Controllers\FournisseurController;
use Illuminate\Support\Facades\Route;

Route::get('fournisseur/dashboard',function(){
    return view('fournisseur.fournisseur_home');
})->middleware('auth:fournisseur');



Route::middleware('auth:fournisseur')
->prefix('/fournisseur/produits')
->group(function(){
    Route::get('/', [FournisseurController::class,'afficherProduit']); //get products
    Route::post('/ajouter',[FournisseurController::class,'ajoutProduit'])->name('ajoutProduit');
   Route::get('/modifier/{produit}',[FournisseurController::class,'afficherModificationForum'])
        ->name('modiferForum');
    Route::patch('/modifier/{produit}',[FournisseurController::class,'modifierProduit'])->name('modifierProduit');
    Route::delete('/{produit}',[FournisseurController::class,'supprimerProduit'])->name('supprimerProduit');
});

Route::middleware('auth:fournisseur')
->prefix('/fournisseur/commandes')
->group(function(){
    Route::get('/',[FournisseurController::class,'afficherCommandes']);
    //commande gerant
    Route::patch('/gerant/valider',[FournisseurController::class,'validerCommande'])
    ->name('validerCommande');
    Route::delete('/gerant/supprimer',[FournisseurController::class,'supprimerCommande'])
    ->name('supprimerCommande');
//commande maintenancier
    Route::patch('/maintenancier/valider',[FournisseurController::class,'validerCommandeMaint'])
    ->name('validerCommandeMaint');
    Route::delete('/maintenancier/supprimer',[FournisseurController::class,'supprimerCommandeMaint'])
    ->name('supprimerCommandeMaint');
});

Route::get('/notifications',[FournisseurController::class,'affNotifications'])
->middleware('auth:fournisseur')
    ->name('fournisseur.notifications');