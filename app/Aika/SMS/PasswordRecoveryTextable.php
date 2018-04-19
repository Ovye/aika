<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/21/2018
 * Time: 11:29 AM
 */

namespace App\Aika\SMS;


use App\Aika\Contractors\Textable;

class PasswordRecoveryTextable extends Textable
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
        parent::__construct();
    }

    public function build()
    {
        return $this->from('Aika')
            ->to($this->data['phone'])
            ->view('sms.auths.password-recovery')
            ->with($this->data)->send();
    }
}