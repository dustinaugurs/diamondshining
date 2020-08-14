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
      

public function orders(Request $request){
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
       return view('frontend.pages.component.order_component', [
         'order'=>'Order',
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
        $orderStatus = $order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
        $setting = Setting::first();
       return view('frontend.pages.component.order_component', [
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
      $orderStatus = $order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
      $setting = Setting::first();
       return view('frontend.pages.component.order_completed_component', [
         'completed'=>'completed',
         'orders' => $this->orders->order($orderStatus),
         'current_currency' => $current_currency,
         'symbol' => $symbol,
         'setting' => $setting,
       ]);
           
      }
      
public function ordersCancelled(Request $request){
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
       return view('frontend.pages.component.order_cancelled_component', [
         'cancelled'=>'cancelled',
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
        //print_r('date_'.$date); die;
        $orderStatus = 1;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
        $base = Auth::user()->currency_code;
        $allcurrency = Currency::where('code', $base)->first();
        $code = $allcurrency['code'];
        $symbol = $allcurrency['symbol']; 
        $price_arr = $this->orders->get_currency();
        $rate = (array) $price_arr['rates'];
        $current_currency = $rate[$code];
        $order = '';
        if($date !== "00_00"){
          $order = $this->orders->orderChange($orderStatus, $date);
        }else{
          $order = $this->orders->order($orderStatus);
        }
        // return view('frontend.pages.component.enquiries_component', [
        //   'enquiry'=> 'enquiry',
        //   'orders' => $this->orders->order($orderStatus),
        //   'current_currency' => $current_currency,
        //   'symbol' => $symbol,
        //   'setting' => $setting,
        // ]);
        return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol]);
    } 
    
    
    public function OrderStatusChanged(Request $request){
      $setting = Setting::first();
      $order_status = $request->order_status;
      $date = $request->date;
      $oid = $request->pid;
      $successMsg = '';
      $orderUpdate = Order::where('id', $oid)->first();
      $orderUpdate->order_status = $order_status;

      if($orderUpdate->save()){
        $successMsg = 'Order Status Successfully Changed';
      }else{
        $successMsg = 'Order Status Not Changed';
      }
      //print_r('date_'.$date); die;
      $orderStatus = 1;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
      $base = Auth::user()->currency_code;
      $allcurrency = Currency::where('code', $base)->first();
      $code = $allcurrency['code'];
      $symbol = $allcurrency['symbol']; 
      $price_arr = $this->orders->get_currency();
      $rate = (array) $price_arr['rates'];
      $current_currency = $rate[$code];
      $order = '';
      if($date !== "00_00"){
        $order = $this->orders->orderChange($orderStatus, $date);
      }else{
        $order = $this->orders->order($orderStatus);
      }
      return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol, 'successMsg'=> $successMsg]);
  }
  //=====---End-Enquiries-ajax-function----====== 

  
  //=====---start-Order-request-ajax-function----======      
public function OrderStatusAndPaymentUpdate(Request $request){
  $setting = Setting::first();
$get_order_status = $request->get_order_status;
$payment_status = $request->payment_status;
$order_status = $request->order_status;
$date = $request->date;
$oid = $request->pid;
$successMsg = '';
$MsgText = '';
$orderUpdate = Order::where('id', $oid)->first();

if(!empty($order_status)){
$orderUpdate->order_status = $order_status;
$MsgText = 'Order Status Successfully Changed';
}

if(!empty($payment_status)){
  $orderUpdate->payment_status = $payment_status;
  $MsgText = 'Payment Status Successfully Changed';
  }

if($orderUpdate->save()){
  $successMsg = $MsgText;
}else{
  $successMsg = 'Your Status Not Changed';
}

$orderStatus = $get_order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
$base = Auth::user()->currency_code;
$allcurrency = Currency::where('code', $base)->first();
$code = $allcurrency['code'];
$symbol = $allcurrency['symbol']; 
$price_arr = $this->orders->get_currency();
$rate = (array) $price_arr['rates'];
$current_currency = $rate[$code];
$order = '';
if($date !== "00_00"){
  $order = $this->orders->orderChange($orderStatus, $date);
}else{
  $order = $this->orders->order($orderStatus);
}
// $query = Order::with('user','diamondfeed','multiplierprice');

//   if($payment_status !== ""){
//      $query->where('payment_status', $payment_status);
//   }

//   if($date !== "00_00"){
//     $query->where('date', $date);
//   }
  
//   $order = $query->where('order_status', $orderStatus)
//                   ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
//                   ->get();

return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol, 'successMsg'=> $successMsg]);
}


  public function dateAndPaymentFilter(Request $request){
    $setting = Setting::first();
  $date = $request->date;
  $payment_status = $request->payment_status;
  $orderStatus = $request->get_order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
  $base = Auth::user()->currency_code;
  $allcurrency = Currency::where('code', $base)->first();
  $code = $allcurrency['code'];
  $symbol = $allcurrency['symbol']; 
  $price_arr = $this->orders->get_currency();
  $rate = (array) $price_arr['rates'];
  $current_currency = $rate[$code];
  $order = '';

  $query = Order::with('user','diamondfeed','multiplierprice');

  if($payment_status !== "0"){
     $query->where('payment_status', $payment_status);
  }

  if($date !== "00_00"){
    $query->where('date', $date);
  }
  
  $order = $query->where('order_status', $orderStatus)
                  ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                  ->orderBy('order_date', 'desc')
                  ->get();

  return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$current_currency, 'symbol'=>$symbol]);
} 
//=====---End-Order-request-ajax-function----====== 
   
	 
   	  
	
	
    
    
	 
}
