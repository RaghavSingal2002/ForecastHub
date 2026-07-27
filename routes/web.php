<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WeatherController;


Route::get('/', function () {
    return view('welcome');
});

// Weather API
Route::prefix('api')->group(function () {
    Route::get('/weather', [WeatherController::class, 'getWeather']);
});
