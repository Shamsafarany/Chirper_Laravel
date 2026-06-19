<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirpController::class, 'index'])->name('home');

Route::post('/chirps', [ChirpController::class, 'store'])->name('store');

Route::get('/chirps/{id}/edit', [ChirpController::class, 'edit'])->name('edit');
Route::put('/chirps/{id}',[ChirpController::class, 'update'])->name('update');

Route::delete('/chirps/{id}', [ChirpController::class, 'destroy'])->name('destroy');



