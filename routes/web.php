<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Paket_TourController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('pengguna', PenggunaController::class)->middleware('auth');
Route::resource('booking', BookingController::class)->middleware('auth');
Route::resource('paket_tour', Paket_TourController::class)->middleware('auth');

require __DIR__.'/auth.php';