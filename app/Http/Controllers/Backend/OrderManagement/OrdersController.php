<?php

namespace App\Http\Controllers\Backend\OrderManagement;

use App\Models\OrderManagement\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\OrderManagement\CreateResponse;
use App\Http\Responses\Backend\OrderManagement\EditResponse;
use App\Repositories\Backend\OrderManagement\OrderRepository;
use App\Http\Requests\Backend\OrderManagement\ManageOrderRequest;
use App\Http\Requests\Backend\OrderManagement\CreateOrderRequest;
use App\Http\Requests\Backend\OrderManagement\StoreOrderRequest;
use App\Http\Requests\Backend\OrderManagement\EditOrderRequest;
use App\Http\Requests\Backend\OrderManagement\UpdateOrderRequest;
use App\Http\Requests\Backend\OrderManagement\DeleteOrderRequest;
use Auth;

/**
 * OrdersController
 */
class OrdersController extends Controller
{
    /**
     * variable to store the repository object
     * @var OrderRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param OrderRepository $repository;
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(ManageOrderRequest $request)
    { 
        //   $base = Auth::user()->currency_code;
        //   $allcurrency = Currency::where('code', $base)->first();
        //   $code = $allcurrency['code'];
        //   $symbol = $allcurrency['symbol']; 
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
         // $current_currency = $rate[$code];

          //echo '<pre>'; print_r($rate['CAD']); die;
        
        $orderStatus = 3;
        $orders=$this->repository->order($orderStatus);
         //print_r($orders); die;
        return new ViewResponse('backend.ordermanagements.index',[
               'ordervalue'=>'OrderValue',
               //'orders'=>$this->repository->order($orderStatus),
               'orders'=>$this->repository->ordersAdmin(),
               'current_currency'=>$rate,
               //'symbol'=>$symbol,
             ]);
    }



    //=====---start-Order-request-ajax-function----======  

    public function printDetails($stockID=''){
        //$products = $this->repository->productSingle($stockID);
       // echo '<pre>'; print_r($products->toArray());die;
        $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
              return view('backend.ordermanagements.print_details', [
                'cancelled'=>'cancelled',
                'products' => $this->repository->productSingle($stockID),
                'current_currency' => $rate,
              ]);
                  
          }      
    
    public function OrderStatusAndPaymentUpdate(Request $request){
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

        $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
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

        return response()->json(['data'=>$order, 'current_currency'=>$rate, 'successMsg'=> $successMsg]);
        }


    public function dateAndPaymentFilter(Request $request){
        $date = $request->date;
        $payment_status = $request->payment_status;
        $orderStatus = $request->get_order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
        
        $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
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
                        ->get();

        return response()->json(['data'=>$order, 'current_currency'=>$rate]);
        } 
//=====---End-Order-request-ajax-function----====== 


    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateOrderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\OrderManagement\CreateResponse
     */
    public function create(CreateOrderRequest $request)
    {
        return new CreateResponse('backend.ordermanagements.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOrderRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreOrderRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.ordermanagements.index'), ['flash_success' => trans('alerts.backend.orders.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\OrderManagement\Order  $order
     * @param  EditOrderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\OrderManagement\EditResponse
     */
    public function edit(Order $order, EditOrderRequest $request)
    {
        return new EditResponse($order);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequestNamespace  $request
     * @param  App\Models\OrderManagement\Order  $order
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $order, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.ordermanagements.index'), ['flash_success' => trans('alerts.backend.orders.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteOrderRequestNamespace  $request
     * @param  App\Models\OrderManagement\Order  $order
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Order $order, DeleteOrderRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($order);
        //returning with successfull message
        return new RedirectResponse(route('admin.ordermanagements.index'), ['flash_success' => trans('alerts.backend.orders.deleted')]);
    }
    
}
