<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->middleware('auth')->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [WeatherController::class, 'index'])->name('dashboard');
    Route::get('/create-city', [WeatherController::class, 'create'])->name('create-city');
    Route::get('/edit-city', [WeatherController::class, 'edit'])->name('edit-city');
});
