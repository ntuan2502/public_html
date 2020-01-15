<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        URL::forceScheme('https');
    }
}
