<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use DB;
use Auth;
use Notification;
use App\Notifications\Frontend\Enquire;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Orders\Order;
use App\Models\Currency;

use Illuminate\Pagination\Paginator;

use App\Repositories\Orders\OrderRepository;

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
    
    
//=====---End-Order-request-ajax-function----====== 
   
	 
   	  
	
	
    
    
	 
}
