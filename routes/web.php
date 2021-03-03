<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});


//Route::get('/proceso', 'App\Http\Controllers\PrincipalController@CrearUsuarios')->name('proceso');
//Route::get('/agregarID', 'App\Http\Controllers\PrincipalController@AgregarIds')->name('AgregarIds');
//Route::get('/agregarIDgrupos', 'App\Http\Controllers\PrincipalController@AgregarIdsGrupos')->name('AgregarIdsGrupos');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\PrincipalController@Index')->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
Route::resources([
        'principal' => 'App\Http\Controllers\PrincipalController'
    ]);
});
