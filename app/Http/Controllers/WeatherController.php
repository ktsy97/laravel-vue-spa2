<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {

        $apiKey = config('services.weather.key');
        $cityNames = ['Sapporo', 'Sendai', 'Niigata', 'Tokyo', 'Nagoya', 'Osaka', 'Hiroshima', 'Fukuoka', 'Naha'];
        $data = [];

        $method = "GET";
        $client = new Client();

        foreach ($cityNames as $cityName) {
            $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&lang=ja&q=$cityName&appid=$apiKey";
            $response = $client->request($method, $url);
            $data[] = json_decode($response->getBody(), true);
        }

        return response()->json($data);
    }

    public function show(Request $request)
    {

        $apiKey = config('services.weather.key');
        $cityName = $request->input('cityName');
        $url = "http://api.openweathermap.org/data/2.5/forecast?units=metric&lang=ja&q=$cityName&appid=$apiKey";

        $method = "GET";
        $client = new Client();

        $response = $client->request($method, $url);
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
