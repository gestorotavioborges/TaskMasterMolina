<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabalhoController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('trabalho',TrabalhoController::class);
