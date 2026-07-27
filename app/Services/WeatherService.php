<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function fetchWeather($location)
    {
        $apiKey = config('services.weather.key');

        return Http::get("https://api.weatherapi.com/v1/forecast.json", [
            'key' => $apiKey,
            'q' => $location,
            'days' => 7,
            'aqi' => 'yes',
            'alerts' => 'yes'
        ])->json();
    }
}
