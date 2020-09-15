<?php

namespace App\Repositories\Backend\OrderManagement;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\OrderManagement\Order;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\DiamondTemplates\DiamondTemplate;
use App\Models\Access\User\User;
use App\Models\Currency;

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Order::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    // 'user_id', 'userEmail', 'diamondFeed_id', 'order_status', 'orderTrackingId', 'checkStatus', 'payment_status',  'status_from_admin', 'deliverycost_from_admin', 'multiplier_id', 'ref_name_contact', 'client', 'ETA', 'order_date', 'date'
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.orders.table').'.id',
                config('module.orders.table').'.created_at',
                config('module.orders.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Order::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.orders.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Order $order
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Order $order, array $input)
    {
    	if ($order->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.orders.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Order $order
     * @throws GeneralException
     * @return bool
     */
    public function delete(Order $order)
    {
        if ($order->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.orders.delete_error'));
    }

    //========================
    public function get_currency(){
        $client = new \GuzzleHttp\Client();     
        // Create a request
        $res = $client->get('https://api.exchangeratesapi.io/latest?base=USD');
        // Get the actual response without headers
        $response =  $res->getBody();
          $aa= (array) json_decode($response);
          return $aa;
      }

      public function ordersAdmin($orderStatus = ''){
        $orders = Order::with('user','diamondfeed', 'multiplierprice')
                    ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                    ->whereIn('order_status', $orderStatus)
                    ->orderBy('order_date', 'asc')
                    ->paginate(10);
                    //->get();
       return $orders;             
     }

    public function order($orderStatus = ''){
        $orders = Order::with('user','diamondfeed', 'multiplierprice')
                    ->where('order_status', $orderStatus)
                    ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                    ->orderBy('order_date', 'asc')
                    ->paginate(10);
                    //->get();
       return $orders;             
     }
     

     public function productSingle($id = ''){
        $products = Order::with('user','diamondfeed', 'multiplierprice')
                    ->where('diamondFeed_id', $id)
                    ->orderBy('order_date', 'desc')
                    ->first();
        //$order = Order::with('user','diamondfeed')->where('diamondFeed_id', $products->id);            
       return $products;             
     }

     public function orderChange($orderStatus = '', $date = ''){
      $orders = Order::with('user','diamondfeed','multiplierprice')
                  ->where('order_status', $orderStatus)
                  ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                  ->orderBy('order_date', 'desc')
                  ->where('date', $date) 
                  ->paginate(5);
                  //->get();
     return $orders;             
   }

   //--------------------------
   public function requestForImageVideo($orderStatus = ''){
    $orders = Order::with('user','diamondfeed','multiplierprice')
                  ->where('order_status', $orderStatus)
                  ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                  ->orderBy('order_date', 'desc')
                  ->get();
     return $orders;              
           }

    public function requestForImgVideo($orderStatus = ''){
        $orders = DB::table('orders')
				->join('users', 'orders.user_id', '=', 'users.id')
				->join('diamond_feeds', 'orders.diamondFeed_id', '=', 'diamond_feeds.id')
				->where('orders.order_status', $orderStatus)
                ->where('orders.status_from_admin', 1)    //Confirm=1, Unconfirm=2
                ->where('diamond_feeds.image', '') 
                ->where('diamond_feeds.active', 1) 
                ->orderBy('orders.order_date', 'desc')
				->select('users.first_name', 'users.last_name', 'users.email', 'diamond_feeds.stock_id', 'diamond_feeds.shape', 'diamond_feeds.image', 'diamond_feeds.video', 'diamond_feeds.id as productID', 'diamond_feeds.ReportNo', 'diamond_feeds.supplier_name', 'diamond_feeds.lab', 'diamond_feeds.pdf', 'orders.order_date', 'orders.id as orderID', 'orders.order_status')
                ->get();
        return $orders;        
               }  
               
    public function requestForVidImage($orderStatus = ''){
          $orders = DB::table('orders')
          ->join('users', 'orders.user_id', '=', 'users.id')
          ->join('diamond_feeds', 'orders.diamondFeed_id', '=', 'diamond_feeds.id')
          ->where('orders.order_status', $orderStatus)
          ->where('orders.status_from_admin', 1)    //Confirm=1, Unconfirm=2
          ->where('diamond_feeds.video', '') 
          ->where('diamond_feeds.active', 1) 
          ->orderBy('orders.order_date', 'desc')
          ->select('users.first_name', 'users.last_name', 'users.email', 'diamond_feeds.stock_id', 'diamond_feeds.shape', 'diamond_feeds.image', 'diamond_feeds.video', 'diamond_feeds.id as productID', 'diamond_feeds.ReportNo', 'diamond_feeds.supplier_name', 'diamond_feeds.lab', 'diamond_feeds.pdf', 'orders.order_date', 'orders.id as orderID', 'orders.order_status')
          ->get();
          return $orders;        
            }   
            
            
   public function requestForCertificate($orderStatus = ''){
    $orders = DB::table('orders')
    ->join('users', 'orders.user_id', '=', 'users.id')
    ->join('diamond_feeds', 'orders.diamondFeed_id', '=', 'diamond_feeds.id')
    ->where('orders.order_status', $orderStatus)
    ->where('orders.status_from_admin', 1)    //Confirm=1, Unconfirm=2
    ->where('diamond_feeds.pdf', '') 
    ->where('diamond_feeds.active', 1) 
    ->orderBy('orders.order_date', 'desc')
    ->select('users.first_name', 'users.last_name', 'users.email', 'diamond_feeds.stock_id', 'diamond_feeds.shape', 'diamond_feeds.image', 'diamond_feeds.video', 'diamond_feeds.id as productID', 'diamond_feeds.ReportNo', 'diamond_feeds.supplier_name', 'diamond_feeds.lab', 'diamond_feeds.pdf', 'orders.order_date', 'orders.id as orderID', 'orders.order_status')
    ->get();
    return $orders;
   }         
    //=========================
}
