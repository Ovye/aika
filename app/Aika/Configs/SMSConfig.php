<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/16/2018
 * Time: 12:01 PM
 */

namespace App\Aika\Configs\SMSConfig;

use App\Aika\Services\Config;
use Ixudra\Curl\Facades\Curl;

class SMSConfig extends Config
{
    public $type = 'sms', $from, $number, $contents, $routing;

    public function __construct($contents = '')
    {
        $this->contents = $contents;
    }

    public function getAllProviders()
    {
        return $this->providers();
    }

    public function getDefaultProvider()
    {
        return $this->defaultProvider();
    }

    public function config($index)
    {
        return $this->getConfig($index);
    }

    public function getProvider($provider_name)
    {
        return $this->provider($provider_name);
    }

    public function getBalance()
    {
        return Curl::to($this->config('url'))
            ->withData(array('checkbalance' => 1, 'token' => $this->config('token')))
            ->get();
    }

    /**
     * @param mixed $contents
     * @return $this
     */

    public function send($contents = '')
    {
        if ($contents != '') {
            $this->contents = $contents;
        }

        $result = Curl::to($this->config('url'))->withData([
            'token' => $this->config('token'),
            'routing' => $this->routing(),
            'sender' => $this->from,
            'to' => $this->number,
            'message' => nl2br(trim($this->contents))
        ])->post();

        $explodedResult = explode('||', $result);

        if (isset($explodedResult[0]) && $explodedResult[0] != 1000) {
            $this->response = $result;
        }

        $this->response = isset($explodedResult[1]) ? $explodedResult[1] : $result;

        return $this;
    }

    public function to($number)
    {
        $this->number = $number;

        return $this;
    }

    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    public function sender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    public function view($path, $data = [])
    {
        $this->contents = view($path, $data);

        return $this;
    }

    public function contents($contents)
    {
        $this->contents = $contents;

        return $this;
    }

    public function routing($routing = 3)
    {
        $this->routing = $routing;

        return $this;
    }

    public function response($index = '')
    {
        $result = json_decode($this->response);
        if ($index != '') {
            return $result->$index;
        }

        return $this->response;
    }


}