<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZingMp3 extends Model
{
    public static function getInfo($music)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://zing-mp3.glitch.me/?url=" . $music,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json",
            ),
        ));

        $response = json_decode(curl_exec($curl));
        $response->link = str_replace('vn//', 'vn/', $response->link);
        $quality = 128;
        $response->audio = str_replace($response->song_id_encode . '_' . $quality, $response->title . ' - ' . $response->artist, $response->source->audio->$quality->download);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return $response;
        }
    }
}
