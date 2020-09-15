<?php

namespace App\Http\Controllers;

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubscribe extends Mailable
{
    use Queueable, SerializesModels;
    public $subscribdata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscribdata)
    {
        $this->subscribdata = $subscribdata;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->view('emails.subscribmail')
                   ->subject('Customer Subscription')
                   ->with([
                    'name' => 'xyz',
                   ]);
                        
    }

   
   
    

}