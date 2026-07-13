<?php

use App\Http\Controllers\ForecastController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WeatherController::class, 'index'])->middleware('auth')->name('home');
Route::get('/forecast/{city}', [ForecastController::class, 'show'])->middleware('auth')->name('show-city');
Route::redirect('/prognoza', '/');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [WeatherController::class, 'index'])->name('dashboard');
    Route::get('/create-weather', [WeatherController::class, 'create'])->name('create-weather');
    Route::get('/{id}/edit-weather', [WeatherController::class, 'edit'])->name('edit-weather');
    Route::post('/store-weather', [WeatherController::class, 'store'])->name('store-weather');
    Route::patch('/{id}/update-weather', [WeatherController::class, 'update'])->name('update-weather');
});
