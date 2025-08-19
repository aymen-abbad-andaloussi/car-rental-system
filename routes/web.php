<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ChatifyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home-cars', [CarController::class, 'index'])->name('home-cars');
    Route::post('/home-cars/store', [CarController::class, 'store'])->name('home-cars.store')->middleware('role:admin|manager');
    Route::delete('/home-cars/destroy{car}', [CarController::class, 'destroy'])->name('home-cars.destroy')->middleware('role:manager');
    Route::put('/home-cars/update{car}', [CarController::class, 'update'])->name('home-cars.update')->middleware('role:manager');

    Route::post('/home-cars', [CarController::class, 'fiterCar'])->name('home-cars.fiterCar');

    Route::get('/home-cars/contact', [ContactController::class, 'contact'])->name('contact');

});

require __DIR__.'/auth.php';
