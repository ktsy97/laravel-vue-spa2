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
            ['user_id', '=', $user->id],
            ['city_name', '=', $cityName]
        ])->get();

        if ($like->isEmpty()) {
            $record = new Like();
            $record->fill(['city_name' => $cityName, 'user_id' => $user->id]);
            $record->save();
        } else {
            Like::where([
                ['user_id', '=', $user->id],
                ['city_name', '=', $cityName]
            ])->delete();
        }
    }
}
