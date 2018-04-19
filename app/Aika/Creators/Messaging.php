<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/19/2018
 * Time: 9:39 AM
 */

namespace App\Aika\Creators;


abstract class Messaging
{
    public abstract function registra($provider);

    public function boot()
    {
        return $this->factory();
    }

}