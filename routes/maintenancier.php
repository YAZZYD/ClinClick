<?php

use App\Http\Controllers\MaintenancierController;
use Illuminate\Support\Facades\Route;


Route::get('/maintenancier/dashboard',function(){
    $maint= auth('maintenancier')->user();
    //$cabinet=DB::table('cabinets')->where('gerant_id',$gerant->id)->first();
    return view('maintenancier.maintenancier_home',['maint'=>$maint]);
})->middleware('auth:maintenancier');

Route::prefix('/maintenancier')
->middleware('auth:maintenancier')
->group(function(){
    Route::get('/market',[MaintenancierController::class,'getAllFournisseurs']);
    Route::get('/market/panier/',[MaintenancierController::class,'afficherPanier'])
    ->name('afficherPanierMaint');
    Route::post('/market/panier/',[MaintenancierController::class,'ajouterAchat'])
    ->name('ajouterAchatMaint');
    Route::delete('/market/panier/{id}',[MaintenancierController::class,'supprimerAchat'])
    ->name('supprimerAchatMaint');
    Route::delete('/market/panier',[MaintenancierController::class,'viderPanier'])
    ->name('viderPanierMaint');
    Route::get('/market/search',[MaintenancierController::class,'rechercher'])
    ->name('maint.rechercher');
    Route::post('/market/commander',[MaintenancierController::class,'commander'])
    ->name('commanderMaint');
    Route::get('/notifications',[MaintenancierController::class,'affNotifications'])
    ->name('maint.notifications');
    Route::get('/pannes/{id}',[MaintenancierController::class,'getPanne'])
    ->name('detailPanne');
    Route::delete('/notification/supprimer/{id}',[MaintenancierController::class,'supprimerNotif'])
    ->name('suppNotif');
    Route::post('/offre',[MaintenancierController::class,'envoyerOffre'])
    ->name('envoyerOffre');
    Route::get('/pannes',[MaintenancierController::class,'getAllPanne'])
    ->name('affPannes');
});