<?php

namespace App\Providers\Aika;

use App\Aika\Services\NormalAlert;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('NormalAlert', function () {
            return new NormalAlert();
        });
    }
}
