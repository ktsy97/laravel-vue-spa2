<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index(Request $request)
    {

        switch ($request->input('area')) {
            case 1:
                // 北海道
                $cityNames = ['Wakkanai',  'Abashiri', 'Asahikawa', 'Sapporo', 'Kushiro', 'Obihiro', 'Muroran', 'Hakodate'];
                break;
            case 2:
                // 東北
                $cityNames = ['Aomori-ken', 'Iwate-ken', 'Miyagi-ken', 'Akita-ken', 'Yamagata-ken', 'Fukushima-ken'];
                break;
            case 3:
                // 関東・甲信
                $cityNames = ['Ibaraki-ken', 'Tochigi-ken', 'Gunma-ken', 'Saitama-ken', 'Chiba-ken', 'Tokyo', 'Kanagawa-ken', 'Yamanashi-ken', 'Nagano-ken'];
                break;
            case 4:
                // 北陸
                $cityNames = ['Niigata-ken', 'Toyama-ken', 'Ishikawa-ken', 'Fukui-ken'];
                break;
            case 5:
                // 東海
                $cityNames = ['Aichi-ken', 'Gifu-ken', 'Shizuoka-ken', 'Mie-ken'];
                break;
            case 6:
                // 近畿
                $cityNames = ['Osaka-fu', 'Hyogo', 'Kyoto Prefecture', 'Shiga-ken', 'Nara-ken', 'Wakayama-ken'];
                break;
            case 7:
                // 中国
                $cityNames = ['Hiroshima-ken', 'Okayama-ken', 'Yamaguchi-ken', 'Shimane-ken', 'Tottori-ken'];
                break;
            case 8:
                // 四国
                $cityNames = ['Kagawa', 'Tokushima-ken', 'Ehime-ken', 'Kochi Prefecture'];
                break;
            case 9:
                // 沖縄
                $cityNames = ['Fukuoka-ken', 'Saga-ken', 'Nagasaki-ken', 'Oita Prefecture', 'Kumamoto-ken', 'Miyazaki-ken', 'Kagoshima-ken', 'Okinawa-ken'];
                break;
            default:
                // 全国
                $cityNames = ['Sapporo', 'Sendai', 'Niigata', 'Tokyo', 'Nagoya', 'Osaka', 'Hiroshima', 'Fukuoka', 'Naha'];
                break;
        }

        $apiKey = config('services.weather.key');
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
