<?php

use Illuminate\Support\Facades\Route;

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
