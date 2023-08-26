<?php

use App\Http\Controllers\GerantController;
use App\Models\Cabinet;
use App\Models\Gerant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/gerant/dashboard',function(){
    $gerant= auth('gerant')->user();
    //$cabinet=DB::table('cabinets')->where('gerant_id',$gerant->id)->first();
    return view('gerant.gerant_home',['gerant'=>$gerant]);
})
->middleware('auth:gerant');

Route::prefix('/gerant')
->middleware('auth:gerant')
->group(function(){
    Route::get('/moncabinet',[GerantController::class,'afficherCabinet']);
    Route::get('/moncabinet/modifier/{cabinet}',[GerantController::class,'afficherModificationForm']);
    Route::patch('/moncabinet/modifier/{cabinet}',[GerantController::class,'modifierCabinet'])
    ->name('modifierCabinet');
    Route::post('/moncabinet/modifer/{cabinet}',[GerantController::class,'ajouterEquipement'])
    ->name('ajouterEquip');
    Route::get('/market',[GerantController::class,'getAllFournisseurs']);
    Route::get('/market/panier/',[GerantController::class,'afficherPanier'])
    ->name('afficherPanier');
    Route::post('/market/panier/',[GerantController::class,'ajouterAchat'])
    ->name('ajouterAchat');
    Route::delete('/market/panier/{id}',[GerantController::class,'supprimerAchat'])
    ->name('supprimerAchat');
    Route::delete('/market/panier',[GerantController::class,'viderPanier'])
    ->name('viderPanier');
    Route::post('/market/commander',[GerantController::class,'commander'])
    ->name('commander');
    Route::get('/market/search',[GerantController::class,'rechercher'])
    ->name('gerant.rechercher');
    Route::post('/pannes/signaler',[GerantController::class,'signalerPanne'])
    ->name('signalerPanne');
    Route::get('/notifications',[GerantController::class,'affNotifications'])
    ->name('gerant.notifications');
    Route::get('/market/categories/{id}',[GerantController::class,'rechercheCat'])
    ->name('rechercherCat');
    Route::get('/offre/{id}',[GerantController::class,'getOffre'])
    ->name('offre');
    Route::post('/offre/valider/{id}',[GerantController::class,'validerOffre'])
    ->name('validerOffre');
    Route::get('/panne',function(Request $request){
        $gerant=auth('gerant')->user();
        $cabinet=App\Models\Cabinet::where('gerant_id',$gerant->id)->first();
        
        return view('gerant.signalerPanne',[
            'gerant'=>$gerant,
            'cabinet'=>$cabinet]);
    })
    ->name('panne');

    Route::get('/commandes',[GerantController::class,'getAllCommandes'])
    ->name('Mescommandes');

});