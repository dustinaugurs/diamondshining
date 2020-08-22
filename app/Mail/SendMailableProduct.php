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

class SendMailableProduct extends Mailable
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

    public function get_currency(){
		$client = new \GuzzleHttp\Client();     
		// Create a request
		$res = $client->get('https://api.exchangeratesapi.io/latest?base=USD');
		// Get the actual response without headers
		$response =  $res->getBody();
	    $aa= (array) json_decode($response);
	    return $aa;
	}

    public function build()
    {   $setting = DB::table('settings')->first();
        $code = Auth::user()->currency_code;
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];
        $current_currency = $rate[$code];
        $symbol = Auth::user()->currency_symbol;
        $vat = $setting->VAT;
        $multipValue = $this->products['multiplier']; 
        
        $mydata = DB::table('diamond_feeds')->where('id', $this->products['productid'])->first();
        //echo '<pre>'; print_r($this->products['multiplier']); die;

        $price = $symbol.''.number_format(floor(($current_currency * ($mydata->price  * $multipValue))*100)/100,2, '.', ''); 

   $finalPrice = $symbol.''.number_format(floor(($current_currency * (($mydata->price * $multipValue)+($mydata->price * $multipValue)*$vat/100))*100)/100,2, '.', ''); 
   
        $pdf = PDF::loadHtml('<html><head><title>'.$this->products['subject'].'</title>'.'<style>
        body{background:#f2f2f2; margin:0px; padding:0px;} 
        body h1{margin:0px 0 0px 0; font-size:15px; padding:10px 15px; text-transform:uppercase;}
        table{width:100%; margin:auto; background:#f2f2f2; font-size:11px; border-collapse:collapse;}
        table tr td, table tr th{border:1px solid #ccc; padding:5px 15px; text-align:left}
        table tr td span{height:35px; width:35px; overflow:hidden; display:block; float:left;}
        table tr td span img{max-width:100%;}
        table tr td:first-child, table tr th:first-child{font-weight:700; text-transform: uppercase; font-size:10px;}
        </style>'.'</head><body><h1>'.$this->products['subject'].'</h1><table>'.
        '<tr>'.'<td>Stock Number </td>'.'<td>'.$mydata->stock_id.'</td>'.'</tr>'.
        '<tr>'.'<td>ReportNo </td>'.'<td>'.$mydata->ReportNo.'</td>'.'</tr>'.
        '<tr>'.'<td>shape </td>'.'<td>'.$mydata->shape.'</td>'.'</tr>'.
        '<tr>'.'<td>carats </td>'.'<td>'.$mydata->carats.'</td>'.'</tr>'.
        '<tr>'.'<td>col </td>'.'<td>'.$mydata->col.'</td>'.'</tr>'.
        '<tr>'.'<td>clar </td>'.'<td>'.$mydata->clar.'</td>'.'</tr>'.
        '<tr>'.'<td>cut </td>'.'<td>'.$mydata->cut.'</td>'.'</tr>'.
        '<tr>'.'<td>pol </td>'.'<td>'.$mydata->pol.'</td>'.'</tr>'.
        '<tr>'.'<td>symm </td>'.'<td>'.$mydata->symm.'</td>'.'</tr>'.
        '<tr>'.'<td>flo </td>'.'<td>'.$mydata->flo.'</td>'.'</tr>'.
        '<tr>'.'<td>floCol </td>'.'<td>'.$mydata->floCol.'</td>'.'</tr>'.
        '<tr>'.'<td>lwratio </td>'.'<td>'.$mydata->lwratio.'</td>'.'</tr>'.
        '<tr>'.'<td>length </td>'.'<td>'.$mydata->length.'</td>'.'</tr>'.
        '<tr>'.'<td>width </td>'.'<td>'.$mydata->width.'</td>'.'</tr>'.
        '<tr>'.'<td>height </td>'.'<td>'.$mydata->height.'</td>'.'</tr>'.
        '<tr>'.'<td>depth(%) </td>'.'<td>'.$mydata->depth.'</td>'.'</tr>'.
        '<tr>'.'<td>table(%) </td>'.'<td>'.$mydata->table.'</td>'.'</tr>'.
        '<tr>'.'<td>culet </td>'.'<td>'.$mydata->culet.'</td>'.'</tr>'.
        '<tr>'.'<td>Certificate </td>'.'<td>'.'<a target="new" href="'.$mydata->pdf.'">'.$mydata->lab.'</a>'.'</td>'.'</tr>'.
        '<tr>'.'<td>girdle </td>'.'<td>'.$mydata->girdle.'</td>'.'</tr>'.
        '<tr>'.'<td>eyeclean </td>'.'<td>'.$mydata->eyeclean.'</td>'.'</tr>'.
        '<tr>'.'<td>brown </td>'.'<td>'.$mydata->brown.'</td>'.'</tr>'.
        '<tr>'.'<td>green </td>'.'<td>'.$mydata->green.'</td>'.'</tr>'.
        '<tr>'.'<td>milky </td>'.'<td>'.$mydata->milky.'</td>'.'</tr>'.
        '<tr>'.'<td>actual_supplier </td>'.'<td>'.$mydata->actual_supplier.'</td>'.'</tr>'.
        '<tr>'.'<td>discount </td>'.'<td>'.$mydata->discount.'</td>'.'</tr>'.
        '<tr>'.'<td>price_per_carat </td>'.'<td>'.$mydata->price_per_carat.'</td>'.'</tr>'.
        '<tr>'.'<td>video </td>'.'<td>'.'<a target="new" href="'.$mydata->video.'">'.'Click For Watch Video'.'</a>'.'</td>'.'</tr>'.
        '<tr>'.'<td>video_frames </td>'.'<td>'.$mydata->video_frames.'</td>'.'</tr>'.
        '<tr>'.'<td>image </td>'.'<td>'.'<span><a target="new" href="'.$mydata->image.'"><img src="'.$mydata->image.'"></a></span>'.'</td>'.'</tr>'.
        '<tr>'.'<td>mine_of_origin </td>'.'<td>'.$mydata->mine_of_origin.'</td>'.'</tr>'.
        '<tr>'.'<td>canada_mark_eligble </td>'.'<td>'.$mydata->canada_mark_eligble.'</td>'.'</tr>'.
        '<tr>'.'<td>supplier_name </td>'.'<td>'.$mydata->supplier_name.'</td>'.'</tr>'.
        '<tr>'.'<td>location </td>'.'<td>'.$mydata->location.'</td>'.'</tr>'.
        '<tr>'.'<td>Dimension(mm) </td>'.'<td>'.$mydata->length.' X '.$mydata->width.' X '.$mydata->height.'</td>'.'</tr>'.
        '<tr>'.'<td>Ratio(%) </td>'.'<td>'.number_format(floor(($mydata->length/$mydata->width)*100)/100,2, '.', '').'</td>'.'</tr>'.
        '<tr>'.'<td>is_returnable </td>'.'<td>'.$mydata->is_returnable.'</td>'.'</tr>'.
        '<tr>'.'<th>Price </th>'.'<th>'.$price.' (Ex. VAT)'.'</th>'.'</tr>'.
        '<tr>'.'<th>Final Price </th>'.'<th>'.$finalPrice.' (Inc. VAT)'.'</th>'.'</tr>'.
        '</table></body></html>');
        //print_r($pdf); die;
        return $this->view('emails.productmail')
                   ->subject('Product Details')
                   ->attachData($pdf->output(), $this->products["pdfname"].".pdf")
                   ->with([
                    'name' => 'xyz',
                   ]);
                        
    }

   
   
    

}