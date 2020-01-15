<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Local;
use App\Image;
use App\Music;
use App\User;
use App\ZingMp3;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadImage(Request $request)
    {
        $url = Local::uploadRandom($request->image);
        $image = new Image();
        $image->url = $url;
        $image->save();
        return response()->json([
            'url' => $url
        ]);
    }

    public function deleteImage(Request $request)
    {
        $protocol = 'https://';
        $HOST = $protocol . $_SERVER['HTTP_HOST'];
        $new_url = str_replace($HOST, '', $request->url);
        Image::where('url', $new_url)->first()->delete();
        File::delete(base_path() . $new_url);
        return response()->json([
            'url' => $request->url,
        ]);
    }

    public function getAccount()
    {
        return view('account');
    }

    public function zingMp3_post(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $music = Music::where('user_id', $user->id)->first();
            if ($music) {
                $link = $request->link;
                $json = ZingMp3::getInfo($link);

                $music->loop = $request->loop;
                $music->auto_play = $request->auto_play;

                $music->link = $json->link;
                $music->title = $json->title;
                $music->artist = $json->artist;
                $music->audio = $json->audio;
                $music->save();
                return response()->json([
                    'json' => $json,
                ]);
            }
        }
    }

    public function change_password_post(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->last_password_changed_at = Carbon::now();
                $user->save();
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function change_infomation_post(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $username = $request->username;
            $name = $request->name;
            $check_user = User::where('username', $username)->count();
            if ($user->username == $username) {
                $user->name = $name;
                $user->save();
                return 1;
            } else if ($check_user > 0) {
                return 0;
            } else {
                $user->username = $username;
                $user->name = $name;
                $user->save();
                return 1;
            }
        }
    }

    public function test()
    {
        $json = ZingMp3::getInfo('https://zingmp3.vn/bai-hat/Co-Chang-Trai-Viet-Len-Cay-Phan-Manh-Quynh/ZW9AZC68.html');
        dd($json);
    }
}
