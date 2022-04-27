<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();

        switch ($request->input('area')) {
            case 1:
                // 北海道・東北
                $cityNames = ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'];
                break;
            case 2:
                // 関東・甲信
                $cityNames = ['茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '山梨県', '長野県'];
                break;
            case 3:
                // 北陸
                $cityNames = ['新潟県', '富山県', '石川県', '福井県'];
                break;
            case 4:
                // 東海
                $cityNames = ['愛知県', '岐阜県', '静岡県', '三重県'];
                break;
            case 5:
                // 近畿
                $cityNames = ['大阪府', '兵庫県', '京都府', '滋賀県', '奈良県', '和歌山県'];
                break;
            case 6:
                // 中国
                $cityNames = ['広島県', '岡山県', '山口県', '島根県', '鳥取県'];
                break;
            case 7:
                // 四国
                $cityNames = ['香川県', '徳島県', '愛媛県', '高知県'];
                break;
            case 8:
                // 沖縄
                $cityNames = ['福岡県', '佐賀県', '長崎県', '大分県', '熊本県', '宮崎県', '鹿児島県', '沖縄県'];
                break;
            default:
                // お気に入り
                // $cityNames = Like::pluck('city_name')->toArray();
                $collection = Like::where('user_id', $user->id)->get();
                $cityNames = $collection->pluck('city_name')->toArray();
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
