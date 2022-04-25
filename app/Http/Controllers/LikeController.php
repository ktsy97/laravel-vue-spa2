<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $cityName = $request->input('cityName');
        $user = Auth::user();

        $like = Like::where([
            ['user_id', $user->id],
            ['city_name', $cityName]
        ])->first();

        if (!isset($like)) {
            $record = new Like();
            $record->fill(['city_name' => $cityName, 'user_id' => $user->id]);
            $record->save();
            // 未登録の場合,falseからtrueに変更する
            $result = true;
        } else {
            Like::destroy($like->id);
            // 登録済みの場合,trueからfalseに変更する
            $result = false;
        }

        return response()->json(['result' => $result]);
    }

    public function check(Request $request)
    {
        $cityName = $request->input('cityName');
        $user = Auth::user();

        $like = Like::where([
            ['user_id', $user->id],
            ['city_name', $cityName]
        ])->first();

        if (!isset($like)) {
            // 未登録の場合,falseを返す
            $result = false;
        } else {
            // 登録済みの場合,trueを返す
            $result = true;
        }

        return response()->json(['result' => $result]);
    }
}
