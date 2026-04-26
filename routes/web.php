<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/appointments', [AppointmentController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/services123', [ServiceController::class, 'store']);
Route::get('/services/{id}/edit', [ServiceController::class, 'edit']);
Route::put('/services/{id}', [ServiceController::class, 'update']);
Route::delete('/services/{id}', [ServiceController::class, 'destroy']);

Route::post('/appointments123', [AppointmentController::class, 'store']);

Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments123', [PaymentController::class, 'store']);
Route::put('/payments/{id}/status', [PaymentController::class, 'updateStatus']);