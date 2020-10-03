<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use DB;
use Auth;
use Notification;
Use Session;
use DateTime;
use DateTimeZone;
use App\Notifications\Frontend\Enquire;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Orders\Order;
use App\Models\Currency;

use Illuminate\Pagination\Paginator;

use App\Repositories\Orders\OrderRepository;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Mail\SendMailableProduct;

use PDF;
use App;

/**
 * Class FrontendController.
 */
class EnquiryOrderController extends Controller
{
    
    protected $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

  
public function multiplier(){
          $multiplier = DB::table('add_multiple_price')
          ->join('diamond_templates', 'add_multiple_price.temp_id', '=', 'diamond_templates.id')
          ->join('users', 'diamond_templates.id', '=', 'users.markup_template')
          ->where('users.id', Auth::user()->id)
          ->select('users.id', 'add_multiple_price.multiplier_usd', 'add_multiple_price.vat_from_usd', 'add_multiple_price.vat_to_usd')
          ->get();
  
          return $multiplier; 
               
                           }	

   
	  public function index(Request $request){
          $base = Auth::user()->currency_code;
          $allcurrency = Currency::where('code', $base)->first();
          $code = $allcurrency['code'];
          $symbol = $allcurrency['symbol']; 
          $price_arr = $this->orders->get_currency();
          $rate = (array) $price_arr['rates'];
          $current_currency = $rate[$code];
         $orderStatus = 1;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
         //$orders = $this->orders->order($orderStatus);
         //echo '<pre>'; print_r($orders->toArray()); die;
         $setting = Setting::first();
       return view('frontend.pages.enquiry_order', [
          'order' => 'Order',
          'orders' => $this->orders->order($orderStatus),
          'current_currency' => $current_currency,
          'symbol' => $symbol,
          'setting' => $setting,
       ]);
           
      }

public function enquiries(Request $request){
        $order_status = $request->order_status;  
        $base = Auth::user()->currency_code;
        $allcurrency = Currency::where('code', $base)->first();
        $code = $allcurrency['code'];
        $symbol = $allcurrency['symbol']; 
        $price_arr = $this->orders->get_currency();
        $rate = (array) $price_arr['rates'];
        $current_currency = $rate[$code];
        $orderStatus = $order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
        $setting = Setting::first();
       return view('frontend.pages.component.enquiries_component', [
         'enquiry'=> 'enquiry',
         'orders' => $this->orders->order($orderStatus),
         'current_currency' => $current_currency,
         'symbol' => $symbol,
         'setting' => $setting,
       ]);
           
      }       
      
public function ordersPlaced(Request $request){
        $order_status = $request->order_status; 
         $base = Auth::user()->currency_code;
          $allcurrency = Currency::where('code', $base)->first();
          $code = $allcurrency['code'];
          $symbol = $allcurrency['symbol']; 
          $price_arr = $this->orders->get_currency();
          $rate = (array) $price_arr['rates'];
          $current_currency = $rate[$code]; 
        $orderStatus = 5;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
        $setting = Setting::first();
       return view('frontend.pages.enquiry_orderPlaced', [
         'order'=>'Order',
         'orders' => $this->orders->order($orderStatus),
         'current_currency' => $current_currency,
         'symbol' => $symbol,
         'setting' => $setting,
       ]);
           
      }      
       
public function ordersCompleted(Request $request){
        $order_status = $request->order_status; 
         $base = Auth::user()->currency_code;
          $allcurrency = Currency::where('code', $base)->first();
          $code = $allcurrency['code'];
          $symbol = $allcurrency['symbol']; 
          $price_arr = $this->orders->get_currency();
          $rate = (array) $price_arr['rates'];
          $current_currency = $rate[$code];
      $orderStatus = 2;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
      $setting = Setting::first();
       return view('frontend.pages.enquiry_orderCompleted', [
         'completed'=>'completed',
         'orders' => $this->orders->order($orderStatus),
         'current_currency' => $current_currency,
         'symbol' => $symbol,
         'setting' => $setting,
       ]);
           
      }
      
      
  public function printDetails($stockID=''){
    $base = Auth::user()->currency_code;
    $allcurrency = Currency::where('code', $base)->first();
    $code = $allcurrency['code'];
    $symbol = $allcurrency['symbol']; 
    $price_arr = $this->orders->get_currency();
    $rate = (array) $price_arr['rates'];
    $current_currency = $rate[$code];
    $setting = Setting::first();
          return view('frontend.pages.print_details', [
            'cancelled'=>'cancelled',
            'products' => $this->orders->productSingle($stockID),
            'current_currency' => $current_currency,
            'symbol' => $symbol,
            'setting' => $setting,
          ]);
              
      }  

//=====---start-Enquiries-ajax-function----======      
public function EnquiryChangeDateTime(Request $request){
        $setting = Setting::first();
        $date = $request->date;
        //print_r('date_'.$request->orderstatus); die;
        $orderStatus = $request->orderstatus;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
        $base = Auth::user()->currency_code;
        $allcurrency = Currency::where('code', $base)->first();
        $code = $allcurrency['code'];
        $symbol = $allcurrency['symbol']; 
        $price_arr = $this->orders->get_currency();
        $rate = (array) $price_arr['rates'];
        $current_currency = $rate[$code];
        $orders = '';
        if($date !== "00_00"){
          $orders = $this->orders->orderChange($orderStatus, $date);
        }else{
          $orders = $this->orders->order($orderStatus);
        }
        return view('frontend.pages.component.enquiries_component', [
          'enquiry'=> 'enquiry',
          'orders' => $orders,
          'current_currency' => $current_currency,
          'symbol' => $symbol,
          'setting' => $setting,
        ]);
        //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol]);
    } 

//===============================

public function OrderChangeDateTime(Request $request){
  $setting = Setting::first();
  $date = $request->date;
  //print_r('date_'.$request->orderstatus); die;
  $orderStatus = $request->orderstatus;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
  $base = Auth::user()->currency_code;
  $allcurrency = Currency::where('code', $base)->first();
  $code = $allcurrency['code'];
  $symbol = $allcurrency['symbol']; 
  $price_arr = $this->orders->get_currency();
  $rate = (array) $price_arr['rates'];
  $current_currency = $rate[$code];
  $orders = '';
  if($date !== "00_00"){
    $orders = $this->orders->orderChange($orderStatus, $date);
  }else{
    $orders = $this->orders->order($orderStatus);
  }
  return view('frontend.pages.component.order_component', [
    'enquiry'=> 'enquiry',
    'orders' => $orders,
    'current_currency' => $current_currency,
    'symbol' => $symbol,
    'setting' => $setting,
  ]);
  //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol]);
} 


//=========================

public function EnquiryToOrderSend(Request $request){
  $setting = Setting::first();
  $base = Auth::user()->currency_code;
  $allcurrency = Currency::where('code', $base)->first();
  $code = $allcurrency['code'];
  $symbol = $allcurrency['symbol']; 
  $price_arr = $this->orders->get_currency();
  $rate = (array) $price_arr['rates'];
  $current_currency = $rate[$code];
  //print_r($request->diamondFeed_ido); die; 
  $orderID = $request->pid;
  $dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
  $order = Order::with('diamondfeed')->where('id', $orderID)->first();
  $order->order_status = 4; //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
  $order->order_date = $dateTime->format("d/m/Y  h:i A");		   
  $order->date = date('m_Y');
  $order->c_symbol = $request->c_symbol; 
  $order->p_finalprice = $request->p_finalprice; 
  $order->save();
  //---------start-mail-section-------------
  if($request->userEmailo !== ''){	
          $enquiry = [
      'username'=> Auth::user()->name,
      'productid'=> $order->diamondFeed_id, 
      'subject' => 'Product Order',
      'stock_number' => $order->diamondfeed->stock_id,
      'setting'=> $setting,
          ];
          $mail = Mail::to($order->userEmail)->send(new SendMailable($enquiry));
       }	
   //---------End-mail-section-------------	
   $orderStatus = 1 ; //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 	   
    $orders = $this->orders->order($orderStatus);
    return view('frontend.pages.component.enquiries_component', [
    'enquiry'=> 'enquiry',
    'orders' => $orders,
    'current_currency' => $current_currency,
    'symbol' => $symbol,
    'setting' => $setting,
  ]);
   
  }
  //-----------------------------

  public function SearchInvoice(Request $request){
    $base = Auth::user()->currency_code;
    $allcurrency = Currency::where('code', $base)->first();
    $code = $allcurrency['code'];
    $symbol = $allcurrency['symbol']; 
    $price_arr = $this->orders->get_currency();
    $rate = (array) $price_arr['rates'];
    $current_currency = $rate[$code];
    $setting = Setting::first();
          return view('frontend.pages.search_invoice', [
            'cancelled'=>'cancelled',
            //'products' => $this->orders->productSingle($stockID),
            'current_currency' => $current_currency,
            'symbol' => $symbol,
            'setting' => $setting,
          ]);
              
      } 

      public function getInvoice(Request $request){
        $setting = Setting::first();
        $invoice_number = explode(",",$request->invoice_number);
        //print_r($invoice_number); die;
        $base = Auth::user()->currency_code;
        $allcurrency = Currency::where('code', $base)->first();
        $code = $allcurrency['code'];
        $symbol = $allcurrency['symbol']; 
        $price_arr = $this->orders->get_currency();
        $rate = (array) $price_arr['rates'];
        $current_currency = $rate[$code];
         $orders = $this->orders->OrdersearchInvoice($invoice_number);
        return view('frontend.pages.component.invoicesearch_component', [
          'enquiry'=> 'enquiry',
          'orders' => $orders,
          'current_currency' => $current_currency,
          'symbol' => $symbol,
          'setting' => $setting,
        ]);
        //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol]);
      }       
    
    
//=====---End-Order-request-ajax-function----====== 
   
	 
   	  
	
	
    
    
	 
}
