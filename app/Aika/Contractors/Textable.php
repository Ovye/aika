<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/20/2018
 * Time: 6:29 PM
 */

namespace App\Aika\Contractors;


use App\Aika\Configs\SMSConfig\SMSConfig;

abstract class Textable
{
    protected $view;
    protected $number;
    protected $sender;
    protected $data;

    public function __construct($message = null)
    {
        return $this->build();
    }

    abstract protected function build();

    public function view($path)
    {
        $this->view = nl2br(view($path, $this->data));

        return $this;
    }

    public function send($message = '')
    {
        return ( new SMSConfig() )->send([
            'to' => $this->number,
            'message' => $message != '' ? $message : $this->view,
            'sender' => $this->sender
        ]);
    }

    public function from(string $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    public function to($number)
    {
        $this->number = $number;

        return $this;
    }

    public function with($data)
    {
        $this->data = $data;

        return $this;
    }

    public function message($contents)
    {
        $this->view = nl2br($contents);

        return $this;
    }

}