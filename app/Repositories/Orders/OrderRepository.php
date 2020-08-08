<?php

namespace App\Repositories\Orders;
use Illuminate\Http\Request;

use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Access\User\User;
use App\Models\Orders\Order;
use Carbon\Carbon;
use Auth;
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
                    ->get();
       return $orders;             
     }

     public function productSingle($stockID = ''){
        $products = Diamondfeed::where('stock_id', $stockID)
                    ->first();
       return $products;             
     }

     public function orderChange($orderStatus = '', $date = ''){
      $orders = Order::with('user','diamondfeed','multiplierprice')
                  ->where('order_status', $orderStatus)
                  ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                  ->where('date', $date) 
                  ->get();
     return $orders;             
   }

   public function orderStatusChange($orderStatus = '', $date = ''){
    $orders = Order::with('user','diamondfeed','multiplierprice')
                ->where('id', $oid)
                ->where('order_status', $orderStatus)
                ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                ->where('date', $date) 
                ->get();
   return $orders;             
 }

 public function orderStatusChangeWithoutDate($orderStatus = ''){
  $orders = Order::with('user','diamondfeed','multiplierprice')
              ->where('order_status', $orderStatus)
              ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
              ->get();
 return $orders;             
}

   
}
