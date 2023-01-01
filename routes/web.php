<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
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

//login
Route::POST('validar',[UsersController::class,'validar'])->name('val');
Route::get('logout',[UsersController::class,'logout'])->name('lout');

//////// lobby segun si esta autenticado o no mostrara si el menu o redirecciona al login
Route::get('/', function () {
    if (Auth::check()) {
       return view('layout.dashboard'); 
    }
    else{
        return view('login.login');
    }
    
});

///////////////////
Route::resource('pedidos',PedidoController::class)->middleware('auth');
Route::resource('users',UsersController::class)->middleware('auth');

//listar los datos de cada menu tarjet proceso,finalizado,bodega
Route::GET('pedidos/listar/procesos',[PedidoController::class,'listProceso'])->name('listproc');
Route::GET('pedidos/listar/finalizados',[PedidoController::class,'listFinalizado'])->name('listfina');

