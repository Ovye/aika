<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/25/2018
 * Time: 1:38 PM
 */

namespace App\Aika\Contracts;


interface AlertsInterface
{
    public function error($message);
    public function warning($message);
    public function info($message);
    public function success($message);
}