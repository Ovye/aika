<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/19/2018
 * Time: 9:43 AM
 */

namespace App\Aika\Factories;

use App\Aika\Creators\Messaging;

class TextMessageFactory extends Messaging
{
    public $registra;

    public function registra($provider)
    {
        $this->registra = $provider;

        return $this;
    }


    protected function factory() {
        return $this->boot();
    }
}