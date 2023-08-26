<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
//home view
Route::get('/admin/dashboard',function(){ return view('admin.admin_home');})
->middleware('auth:admin');


Route::middleware('auth:admin')
->prefix('/admin/requests')
->group(function(){
    //Route::get('/gerants/',[AdminController::class,'showGerant']);
    Route::get('/',[AdminController::class,'afficherRequests']);
    Route::patch('/gerants/{gerant}',[AdminController::class,'confirmeGerant'])->name('validateGerant');
    Route::patch('/fournisseurss/{fournisseur}',[AdminController::class,'confirmeFournisseur'])->name('validateFournisseur');
    Route::patch('/maintenancier/{maintenancier}',[AdminController::class,'confirmeMaintenancier'])->name('validateMaintenancier');
});

Route::
prefix('/admin/customers')
->group(function(){
    Route::get('/',[AdminController::class,'afficherCustomers']);
    Route::patch('/gerant/{gerant}',[AdminController::class,'suspendGerant'])->name('suspendGerant');
    Route::patch('/maintenancier/{maintenancier}',[AdminController::class,'suspendMaintenancier'])->name('suspendMaintenancier');
    Route::patch('/fournisseur/{fournisseur}',[AdminController::class,'suspendFournisseur'])->name('suspendFournisseur');    
});
