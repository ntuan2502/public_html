<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public static function checkMusic($user_id)
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
