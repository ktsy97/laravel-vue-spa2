<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {

        $apiKey = '3374b7b2a891beb20ae377ab0a4441f8';

        $cityNames = ['Tokyo', 'Osaka', 'Nagoya'];

        $data = [];

        foreach ($cityNames as $cityName) {
            $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&lang=ja&q=$cityName&appid=$apiKey";

            $method = "GET";

            $client = new Client();

            $response = $client->request($method, $url);

            $data[] = json_decode($response->getBody(), true);
        }

        return response()->json($data);
    }

    public function show(Request $request)
    {

        $cityName = $request->input('cityName');
        $apiKey = '3374b7b2a891beb20ae377ab0a4441f8';
        $url = "http://api.openweathermap.org/data/2.5/forecast?units=metric&lang=ja&q=$cityName&appid=$apiKey";

        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $data = $response->getBody();
        $data = json_decode($data, true);

        return response()->json($data);
    }
}
