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
    return view('login');
});

Route::view('/administrador','Administrador/admin');

Route::view('/unidades','Administrador/unidades');
Route::view('/aspectoevaluacion','Administrador/AspectosEvaluacion');
Route::view('/valoracion','Administrador/valoracion');
Route::view('/empresa','Administrador/empresa');
