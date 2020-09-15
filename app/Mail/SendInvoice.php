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

class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;
    public $products;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($products)
    {
        $this->products = $products; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        //print_r($pdf); die;
        return $this->view('emails.sendinvoiceinstruction')
                   ->subject('Product Details')
                   ->attach($this->products['fileName'])
                   ->with([
                    'name' => 'xyz',
                   ]);
                        
    }

   
   
    

}