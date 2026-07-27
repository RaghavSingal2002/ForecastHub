<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeatherService;
use App\Models\SearchHistory;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getWeather(Request $request)
    {
        // ✅ Validate request
        $request->validate([
            'q' => 'required|string|max:100'
        ]);

        $location = trim($request->query('q'));

        try {

            // ✅ Save search only if not recently saved
            SearchHistory::updateOrCreate(
                ['location' => $location],
                ['updated_at' => now()]
            );

            // ✅ Fetch weather
            $data = $this->weatherService->fetchWeather($location);

            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => 'Unable to fetch weather data'
            ], 500);
        }
    }
}
