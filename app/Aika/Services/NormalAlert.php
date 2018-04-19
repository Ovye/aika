<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/25/2018
 * Time: 1:40 PM
 */

namespace App\Aika\Services;


use App\Aika\Contracts\AlertsInterface;

class NormalAlert implements AlertsInterface
{
    public function error($message)
    {
        return alert('error', $message);
    }

    public function info($message)
    {
        return alert('info', $message);
    }

    public function success($message)
    {
        return alert('success', $message);
    }

    public function warning($message)
    {
        return alert('warning', $message);
    }


}