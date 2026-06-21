<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;

Route::get('/', [ChirpController::class, 'index'])->name('home');
Route::middleware('auth')-> group(function(){
    Route::post('/chirps', [ChirpController::class, 'store'])->name('store');
    Route::get('/chirps/{id}/edit', [ChirpController::class, 'edit'])->name('edit');
    Route::put('/chirps/{id}',[ChirpController::class, 'update'])->name('update');
    Route::delete('/chirps/{id}', [ChirpController::class, 'destroy'])->name('destroy');
});


//register routes
Route::get('/register', function(){
    return view('/auth/register');
})->middleware('guest')->name('register');
Route::post('/register', Register::class)->middleware('guest');

Route::post('/logout', Logout::class)->middleware('auth');

