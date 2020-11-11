<?php

namespace App\Repositories\Orders;
use Illuminate\Http\Request;

use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Access\User\User;
use App\Models\Orders\Order;
use Carbon\Carbon;
use Auth;
use DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Currency;


class OrderRepository
{  

    public function get_currency(){
        $client = new \GuzzleHttp\Client();     
        // Create a request
        $res = $client->get('https://api.exchangeratesapi.io/latest?base=USD');
        // Get the actual response without headers
        $response =  $res->getBody();
          $aa= (array) json_decode($response);
          return $aa;
      }

    public function order($orderStatus = ''){
        $orders = Order::with('user','diamondfeed', 'multiplierprice')
                    ->where('order_status', $orderStatus)
                    ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('order_date', 'desc')
                    ->paginate(9);
                    //->get();
       return $orders;             
     }

     public function productSingle($stockID = ''){
        $products = DB::table('diamond_feeds')
                    ->join('orders', 'diamond_feeds.id', '=', 'orders.diamondFeed_id')
                    ->where('stock_id', $stockID)
                    ->first();
       return $products;             
     }

     public function orderChange($orderStatus = '', $date = ''){
      $orders = Order::with('user','diamondfeed','multiplierprice')
                  ->where('order_status', $orderStatus)
                  ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                  ->where('user_id', Auth::user()->id)
                  ->orderBy('order_date', 'desc')
                  ->where('date', $date) 
                  ->paginate(9);
                  //->get();
     return $orders;             
   }

   public function orderStatusChange($orderStatus = '', $date = ''){
    $orders = Order::with('user','diamondfeed','multiplierprice')
                ->where('id', $oid)
                ->where('order_status', $orderStatus)
                ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                ->where('user_id', Auth::user()->id)
                ->orderBy('order_date', 'desc')
                ->where('date', $date) 
                ->paginate(9);
                //->get();
   return $orders;             
 }

 public function orderStatusChangeWithoutDate($orderStatus = ''){
  $orders = Order::with('user','diamondfeed','multiplierprice')
              ->where('order_status', $orderStatus)
              ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
              ->where('user_id', Auth::user()->id)
              ->orderBy('order_date', 'desc')
              ->paginate(9);
              //->get();
 return $orders;             
}


public function OrdersearchInvoice($invoice_number = ''){
  $orders = Order::with('user','diamondfeed','multiplierprice')
              ->whereIn('invoice_number', $invoice_number)
              ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
              ->where('user_id', Auth::user()->id)
              ->whereIn('checkStatus', [2,3])
              ->orderBy('order_date', 'desc')
              ->get();
 return $orders;             
}

   
}
