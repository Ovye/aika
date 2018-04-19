<?php

namespace App\Providers\Aika;

use App\Aika\Contracts\SocialiteUsersInterface;
use App\Aika\Contracts\UsersInterface;
use App\Models\Auths\SocialiteUser;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        App::bind(UsersInterface::class, function () {
            return new User();
        });

        App::bind(SocialiteUsersInterface::class, function () {
            return new SocialiteUser();
        });
    }
}
