<?php

use Illuminate\Support\Facades\Route;

Route::get('/series', 'App\Http\Controllers\SeriesController@index')
    ->name('Lista_series');
Route::get('/series/criar', 'App\Http\Controllers\SeriesController@create')
    ->name('form_criar_serie');
Route::post('/series/criar', 'App\Http\Controllers\SeriesController@store');
Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy');
