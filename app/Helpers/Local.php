<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class Local
{
    public static function upload($file)
    {
        $fileName = $file->getClientOriginalName();
        $file->move('upload', $fileName);
        $fileName = '/upload/' . $fileName;
        return $fileName;
    }

    public static function uploadRandom($file)
    {
        $fileName = substr(md5($file->getClientOriginalName() . date("Y-m-d h:i:sa")), 15) . '.' . $file->getClientOriginalExtension();
        $file->move('upload', $fileName);
        $fileName = '/upload/' . $fileName;
        return $fileName;
    }

    public static function delete($url){
        File::delete(base_path() . '/' . $url);
    }
}
