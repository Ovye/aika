<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var $data mixed
     */
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param $data mixed
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@aika.com.ng', "Aika")
            ->subject('Aika account email verification')
            ->markdown('emails.auths.verify-email')
            ->with($this->data);
    }
}
