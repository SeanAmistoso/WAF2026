<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HikeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('locations', LocationController::class);
Route::resource('hikes', HikeController::class);