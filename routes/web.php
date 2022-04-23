<?php

use Illuminate\Support\Facades\Route;

Route::get('/series', 'App\Http\Controllers\SeriesController@listarSeries');
