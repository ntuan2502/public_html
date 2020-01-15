<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use App\Music;
use App\User;
use App\UserSocial;
use App\ZingMp3;

class UserSocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser);
        return redirect('/#');
    }

    public function findOrCreateUser($user, $provider)
    {

        $account = UserSocial::where([
            'provider_id' => $user->id,
            'provider' => $provider,
        ])->first();

        if ($account) {
            $account->user->avatar = $user->avatar;
            $account->user->updated_at = Carbon::now();
            $account->user->save();

            $this->checkMusic($account->user->id);

            return $account->user;
        } else {
            $account = new UserSocial([
                'provider_id' => $user->id,
                'provider' => $provider
            ]);

            $authUser = User::where('email', $user->email)->first();

            if ($authUser) {
                $authUser->avatar = $user->avatar;
                $authUser->updated_at = Carbon::now();
                $authUser->save();
            } else {
                $authUser = new User;
                $authUser->email = $user->email;
                $authUser->name = $user->name;
                $authUser->password = bcrypt($user->email);
                $authUser->avatar = $user->avatar;
                $authUser->save();
            }
            $this->checkMusic($authUser->id);

            $account->user()->associate($authUser);
            $account->save();

            return $authUser;
        }
    }

    public function checkMusic($user_id)
    {
        $music = Music::where('user_id', $user_id)->first();
        if ($music) {
            $json = ZingMp3::getInfo($music->link);

            $music->title = $json->title;
            $music->artist = $json->artist;
            $music->audio = $json->audio;
            $music->save();
        } else {
            $music = new Music();
            $music->user_id = $user_id;

            // $link = 'https://zingmp3.vn/bai-hat/Kiss-The-Rain-Yiruma/ZWZD909W.html';
            $link = 'https://zingmp3.vn/bai-hat/Happy-New-Year-A-Teens/ZW6I60C9.html';
            $json = ZingMp3::getInfo($link);

            $music->link = $json->link;
            $music->title = $json->title;
            $music->artist = $json->artist;
            $music->audio = $json->audio;
            $music->save();
        }
    }
}
