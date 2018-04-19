<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/16/2018
 * Time: 11:50 AM
 */
namespace App\Aika\Services;

use App\Models\App\Config as ConfigModel;

abstract class Config
{
    protected $type;
    public $response;

    protected function boot()
    {
        return $this;
    }

    protected function providers()
    {
        $this->response = ConfigModel::whereIndex($this->type)->first()->value;
        return $this;
    }

    protected function provider($provider)
    {
        foreach ($this->providers()->asObject() as $driver) {
            if ($driver->provider == $provider) {
                $this->response = $driver;
            }
        }

        return $this;
    }

    protected function defaultProvider()
    {
        foreach ($this->providers()->asObject() as $provider) {
            if ($provider->is_default == 1) {
                $this->response = json_encode($provider);
            }
        }

        return $this;
    }

    public function asObject()
    {
        return json_decode($this->response);
    }

    public function asJson()
    {
        return $this->response;
    }

    protected function getConfig($index)
    {
        $data = $this->defaultProvider()->asObject();

        return $data == true ? $data->$index : $this;
    }

}