<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index() {

        $cityName = 'Tokyo';
        $apiKey = '43c7cb699eb50188a5cf9e3b3a131169';
        $url = "http://api.openweathermap.org/data/2.5/weather?units=metric&lang=ja&q=$cityName&appid=$apiKey";

        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $data = $response->getBody();
        $data = json_decode($data, true);

        return response()->json($data);
    }

    public function show() {

        $cityName = 'Tokyo';
        $apiKey = '43c7cb699eb50188a5cf9e3b3a131169';
        $url = "http://api.openweathermap.org/data/2.5/forecast?units=metric&lang=ja&q=$cityName&appid=$apiKey";

        $method = "GET";

        $client = new Client();

        $response = $client->request($method, $url);

        $data = $response->getBody();
        $data = json_decode($data, true);

        return response()->json($data);
    }
}
