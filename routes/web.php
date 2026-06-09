<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirpController::class, 'index']);

Route::get('/signIn', function(){
    return view('signIn', ["username" => "example@gmail.com"]);
});

