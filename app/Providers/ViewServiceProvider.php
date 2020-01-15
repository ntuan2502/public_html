<?php

namespace App\Providers;

use App\Category;
use App\Music;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $vsp_user = Auth::user();
            $vsp_categories = Category::all();

            $vsp_maintenance = Setting::where('name', 'maintenance')->first();
            if (!$vsp_maintenance) {
                $vsp_maintenance = new Setting;
                $vsp_maintenance->name = 'maintenance';
                $vsp_maintenance->save();
            }
            $vsp_facebook = Setting::where('name', 'facebook')->first();
            if (!$vsp_facebook) {
                $vsp_facebook = new Setting;
                $vsp_facebook->name = 'facebook';
                $vsp_facebook->save();
            }
            $vsp_youtube = Setting::where('name', 'youtube')->first();
            if (!$vsp_youtube) {
                $vsp_youtube = new Setting;
                $vsp_youtube->name = 'youtube';
                $vsp_youtube->save();
            }
            $vsp_discord = Setting::where('name', 'discord')->first();
            if (!$vsp_discord) {
                $vsp_discord = new Setting;
                $vsp_discord->name = 'discord';
                $vsp_discord->save();
            }
            $vsp_background = Setting::where('name', 'background')->first();
            if (!$vsp_background) {
                $vsp_background = new Setting;
                $vsp_background->name = 'background';
                $vsp_background->save();
            }

            #region

            $download = Setting::where('name', 'download')->first();
            if (!$download) {
                $download = new Setting;
                $download->name = 'download';
                $download->save();
            }
            $version = Setting::where('name', 'version')->first();
            if (!$version) {
                $version = new Setting;
                $version->name = 'version';
                $version->save();
            }
            $name_version = Setting::where('name', 'name_version')->first();
            if (!$name_version) {
                $name_version = new Setting;
                $name_version->name = 'name_version';
                $name_version->save();
            }
            $update_time = Setting::where('name', 'update_time')->first();
            if (!$update_time) {
                $update_time = new Setting;
                $update_time->name = 'update_time';
                $update_time->save();
            }
            $mod_32bit = Setting::where('name', 'mod_32bit')->first();
            if (!$mod_32bit) {
                $mod_32bit = new Setting;
                $mod_32bit->name = 'mod_32bit';
                $mod_32bit->save();
            }
            $mod_64bit = Setting::where('name', 'mod_64bit')->first();
            if (!$mod_64bit) {
                $mod_64bit = new Setting;
                $mod_64bit->name = 'mod_64bit';
                $mod_64bit->save();
            }

            #endregion

            if ($vsp_user) {
                $vsp_music = Music::where('user_id', $vsp_user->id)->first();
                $vsp_user->join = Carbon::parse($vsp_user->created_at)->format('d-m-Y');
                $vsp_user->change_pass_at = $vsp_user->last_password_changed_at ? Carbon::parse($vsp_user->last_password_changed_at)->format('H:i:s d-m-Y') : "You have not changed your password. The default password is your email address.!";
                $view->with([
                    'vsp_music' => $vsp_music,
                    'vsp_user' => $vsp_user,
                    'vsp_categories' => $vsp_categories,
                    'vsp_maintenance' => $vsp_maintenance,
                    'vsp_facebook' => $vsp_facebook,
                    'vsp_youtube' => $vsp_youtube,
                    'vsp_discord' => $vsp_discord,
                    'vsp_background' => $vsp_background,
                ]);
            } else {
                $view->with([
                    'vsp_user' => $vsp_user,
                    'vsp_categories' => $vsp_categories,
                    'vsp_maintenance' => $vsp_maintenance,
                    'vsp_facebook' => $vsp_facebook,
                    'vsp_youtube' => $vsp_youtube,
                    'vsp_discord' => $vsp_discord,
                    'vsp_background' => $vsp_background,
                ]);
            }
        });
    }
}
