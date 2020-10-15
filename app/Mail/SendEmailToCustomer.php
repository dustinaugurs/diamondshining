<?php

namespace App\Http\Controllers;

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 use PDF;
 use DB;
 use Auth;

class SendEmailToCustomer extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        //print_r($pdf); die;
        return $this->view('emails.sendemailtocustomer')
                   ->subject($this->mailData['subject'])
                   ->with([
                    'name' => 'xyz',
                   ]);
                        
    }

   
   
    

}