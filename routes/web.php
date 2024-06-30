<?php

use App\Http\Controllers\ComplexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;



Route::get('/', [ComplexController::class, 'index'])->name('index');

Route::get('/dashboard', [ComplexController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/complex/{complex}', [ComplexController::class, 'show'])->name('complex.show');

Route::get('/leave-request', [RequestController::class, 'create'])->name('leave-request');
Route::post('/leave-request', [RequestController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.show');
    Route::get('/requests/{request}', [RequestController::class, 'edit'])->name('request.edit');
    Route::patch('/requests/{requestModel}', [RequestController::class, 'update'])->name('request.update');
    Route::delete('/requests/{requestModel}', [RequestController::class, 'destroy'])->name('request.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
