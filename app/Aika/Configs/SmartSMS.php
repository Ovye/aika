<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/19/2018
 * Time: 9:50 AM
 */

namespace App\Aika\Configs;


use App\Aika\Services\SMSService;
use App\Models\App\Config as ConfigModel;
use Ixudra\Curl\Facades\Curl;

class SmartSMS implements SMSService
{
    protected $response;

    public function register()
    {
        $providers = ConfigModel::whereIndex('sms')->first()->value;
        foreach (json_decode($providers) as $driver) {
            if ($driver->provider == 'smartxmx') {
                $this->response = $driver;
            }
        }

        return $this;
    }

    public function asObject()
    {
        return $this->response;
    }

    public function asJson()
    {
        return $this->response;
    }

    public function provider()
    {
        return $this->register()->response;
    }

    public function get($index)
    {

        $data = $this->provider();

        return $data == true ? $data->$index : $this;
    }

    public function send($data)
    {
        $data['token'] = $this->get('token');
        $data['routing'] = 3;

        $result = Curl::to($this->get('url'))->withData($data)->post();

        $explodedResult = explode('||', $result);

        if (isset($explodedResult[0]) && $explodedResult[0] != 1000) {
            $this->response = $result;
        }

        $this->response = $explodedResult[1];

        return $this;
    }

    public function getUnits()
    {
        return Curl::to($this->get('url'))
            ->withData( array( 'checkbalance' => 1, 'token' => $this->get('token')) )
            ->get();
    }
}