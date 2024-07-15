<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/games', GameController::class);
Route::resource('/authors', AuthorController::class);
