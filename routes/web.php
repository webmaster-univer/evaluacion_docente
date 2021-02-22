<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\PrincipalController@Index')->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
Route::resources([
        'principal' => 'App\Http\Controllers\PrincipalController'
    ]);
});
