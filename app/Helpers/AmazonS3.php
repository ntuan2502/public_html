<?php

namespace App\Helpers;

use Storage;

class AmazonS3
{
    public static function upload($file)
    {
        $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        Storage::disk('s3')->put($file->getClientOriginalName(), file_get_contents($file));
        return $url . $file->getClientOriginalName();
    }

    public static function uploadRandom($file)
    {
        $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        $fileName = substr(md5($file->getClientOriginalName() . date("Y-m-d h:i:sa")), 15) . '.' . $file->getClientOriginalExtension();
        Storage::disk('s3')->put($fileName, file_get_contents($file));
        return $url . $fileName;
    }

    public static function delete($filename)
    {
        $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        $name = str_replace($url, '', $filename);
        Storage::disk('s3')->delete($name);
    }

    public static function getAllFile()
    {
        $files = Storage::disk('s3')->files();
        return $files;
    }
}
