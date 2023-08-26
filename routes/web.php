<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Login View

Route::middleware('guest')->get('/login',function(){
    return view("auth.login.login");
})->name('login');


//Register View

Route::prefix('/register')
->group(function(){
    Route::get('/gerant', function(){
        return view('auth.register.register_gerant');
    });

Route::get('/fournisseur', function(){
    return view('auth.register.register_fournisseur');
});
Route::get('/maintenancier', function(){
    return view('auth.register.register_maintenancier');
});    
});



//login

Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');

//logout

Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::prefix('/register')
->name('register.')
->group(function(){

    Route::post('/gerant',[\App\Http\Controllers\Auth\RegisterController::class,'createGerant'])
    ->name('gerant');
    Route::post('/maintenancier',[\App\Http\Controllers\Auth\RegisterController::class,'createMaint'])
    ->name('maintenancier');
    Route::post('/fournisseur',[\App\Http\Controllers\Auth\RegisterController::class,'createFournisseur'])
    ->name('fournisseur');


});




//Route file for admin role

require __DIR__ . '/admin.php';
    
//Route file for fournisseur role

require __DIR__ . '/fournisseur.php';

//Route file for gerant role

require __DIR__ . '/gerant.php';

//Route file for maintenancier role

require __DIR__ . '/maintenancier.php';