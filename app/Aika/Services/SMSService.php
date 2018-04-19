<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/19/2018
 * Time: 9:45 AM
 */

namespace App\Aika\Services;


interface SMSService
{
    public function register();

    public function asObject();

    public function asJson();

    public function provider();

    public function get($index);

    public function send($data);

    public function getUnits();
}