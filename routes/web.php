<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WeatherController::class, 'index'])->middleware('auth')->name('home');
Route::get('/forecast/{city}', [WeatherController::class, 'show'])->middleware('auth')->name('show-city');
Route::redirect('/prognoza', '/');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [WeatherController::class, 'index'])->name('dashboard');
    Route::get('/create-city', [WeatherController::class, 'create'])->name('create-city');
    Route::get('/{city}/edit-city', [WeatherController::class, 'edit'])->name('edit-city');
    Route::post('/store-city', [WeatherController::class, 'store'])->name('store-city');
    Route::patch('/{city}/update-city', [WeatherController::class, 'update'])->name('update-city');
});
