<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/20/2018
 * Time: 6:32 PM
 */

namespace App\Aika\SMS;


use App\Aika\Contractors\Textable;

class NewRegistrationSms extends Textable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        parent::__construct();
    }

    public function build()
    {
        return $this->from('Aika')
            ->to($this->data['user'])
            ->view('new_reg_sms')
            ->with($this->data)->send();
    }

}