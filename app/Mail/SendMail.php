<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $email;
   public $message;
   public function __construct($email, $message)
   {
       $this->email = $email;
       $this->message = $message;
   }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail')->to('ashoka2342@gmail.com')
                                  ->subject('test')
                                  ->from('iskool@gmail.com');
    }
}
