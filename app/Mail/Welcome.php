<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = 'EDULE';
        $address = env('MAIL_FROM_ADDRESS');
        $subject = 'You have Successfully Registered';

        return $this->view('mail.welcome')
         ->from($address, $name)
        ->replyTo($address, $name)
        ->subject($subject)
        ->with([
            'user' => $this->user,
        ]);
    }
}
