<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/series', 'App\Http\Controllers\SeriesController@index')
    ->name('Lista_series');

Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('autenticador');

Route::post('/series/criar', 'App\Http\Controllers\SeriesController@store')
    ->middleware('autenticador');

Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy')
    ->middleware('autenticador');

Route::get('/series/{serieid}/temporadas', 'App\Http\Controllers\TemporadasController@index');

Route::post('/series/{id}/editaNome', 'App\Http\Controllers\SeriesController@editaNome')
    ->middleware('autenticador');

Route::get('/temporadas/{temporada}/episodios', 'App\Http\Controllers\EpisodioController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'App\Http\Controllers\EpisodioController@assistir')
    ->middleware('autenticador');

Route::get('/entrar', 'App\Http\Controllers\EntrarController@index');
Route::post('/entrar', 'App\Http\Controllers\EntrarController@entrar');

Route::get('/registrar', 'App\Http\Controllers\RegistroController@create')->name('login');
Route::post('/registrar', 'App\Http\Controllers\RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
