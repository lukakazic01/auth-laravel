<?php

use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\UserCitiesController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->middleware('auth')->name('home');

Route::get('/forecast/search', [ForecastController::class, 'search'])->middleware('auth')->name('forecasts-search');
Route::get('/forecast/{city}', [ForecastController::class, 'show'])->middleware('auth')->name('show-forecast');
Route::get('/forecasts', [ForecastController::class, 'index'])->middleware('auth')->name('forecasts');

Route::post('/user-cities/favorite/{city}', [UserCitiesController::class, 'favorite'])->middleware('auth')->name('user-favorite');

Route::redirect('/prognoza', '/');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::prefix('/weather')->group(function () {
        Route::get('/', [AdminWeatherController::class, 'index'])->name('dashboard');
        Route::get('/create', [AdminWeatherController::class, 'create'])->name('create-weather');
        Route::get('/{weather}/edit', [AdminWeatherController::class, 'edit'])->name('edit-weather');
        Route::post('/store-weather', [AdminWeatherController::class, 'store'])->name('store-weather');
        Route::patch('/{weather}/update', [AdminWeatherController::class, 'update'])->name('update-weather');
        Route::delete('/{weather}/destroy', [AdminWeatherController::class, 'destroy'])->name('destroy-weather');
    });

    Route::prefix('/forecast')->group(function () {
        Route::get('/', [AdminForecastController::class, 'index'])->name('forecasts');
        Route::get('/create', [AdminForecastController::class, 'create'])->name('create-forecast');
        Route::post('/store', [AdminForecastController::class, 'store'])->name('store-forecast');
        Route::delete('/{forecast}/destroy', [AdminForecastController::class, 'destroy'])->name('destroy-forecast');
    });
});
