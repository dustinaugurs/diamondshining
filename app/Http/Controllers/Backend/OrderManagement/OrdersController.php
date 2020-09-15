<?php

namespace App\Http\Controllers\Backend\OrderManagement;

use App\Models\OrderManagement\Order;
use App\Models\Settings\Setting;
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
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use Auth;
use DB;
use PDF;
use App;
Use Session;
use DateTime;
use DateTimeZone;
use App\Mail\SendInvoice;

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
         $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol; 
          //print_r($current_currency);die;
         $setting = Setting::first();
         $orderStatus = [2,3,4,5];
             
        $orders = Order::with('user','diamondfeed')
                    ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                    ->whereIn('order_status', $orderStatus)
                    ->orderBy('order_date', 'desc')
                    ->paginate(10);
                    //->get();
    
                  
         
        //  echo '<pre>'; print_r($orders->user->tid); 
        //     die;            

        return new ViewResponse('backend.ordermanagements.index',[
               'ordervalue'=>'OrderValue',
               //'orders'=>$this->repository->order($orderStatus),
               'orders'=>$this->repository->ordersAdmin($orderStatus),
               'current_currency'=>$current_currency,
               'setting' => $setting,
               'symbol'=>$symbol,
             ]);
    }



    //=====---start-Order-request-ajax-function----======  

    public function printDetails($stockID=''){
        $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol;

          $setting = Setting::first();
              return view('backend.ordermanagements.print_details', [
                'cancelled'=>'cancelled',
                'products' => $this->repository->productSingle($stockID),
                'current_currency'=>$current_currency,
               'setting' => $setting,
               'symbol'=>$symbol,
              ]);
                  
          } 
          
  //--------------------------------------------
  public function generateInvoicePDF($oid = ''){
      $lastinvid = Order::orderBy('id', 'DESC')->first(); 
      $invoice = ((int)$lastinvid->id)+'1';
    //print_r($invoiceNumber);
    //die;
       //-------Generate-Invoice-Section-------
        $order = Order::with('user','diamondfeed')->where('id', $oid)->first();
        $setting = Setting::first();
        $dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
        $date = $dateTime->format("d-m-Y");
        $uID = 'UID'.$order->user->id;
        $invoiceNumber = $uID.'F'.$invoice.time(); 
        $uipStockid = $order->diamondfeed->stock_id;
        $filename = $uipStockid.'-'.$uID.'-'.$date.'-'.time().'.pdf'; 	
        $pdf_invoice_file_path = public_path('invoicepdf/').$filename;
        $pdf = PDF::loadView('emails.sendinvoice', [
            'order' => $order,
            'setting' => $setting,
            'invoicenumber' => $invoiceNumber
            ]);
        $pdf->save($pdf_invoice_file_path);
         $pdf->stream();
         
         $order->invoice_number = $invoiceNumber;
         $order->invoice_file = $filename;
         $order->save();
        //---------Mail-Section-------------
        $products = [ 
              'fileName' => $pdf_invoice_file_path,
              'address' => $setting->company_address,
              'fromName' => $setting->from_name, 
              'customername'=> $order->user->first_name.' '.$order->user->last_name,
              'invoiceNumber' => $order->invoice_number,
              'stockNumber' => $order->diamondfeed->stock_id,
              'duedate' => $order->order_date,  
              ];

         //$sendmail = $order->userEmail;     
         $sendmail = 'augurstest@gmail.com';
		if($sendmail !== ''){	
			$mail = \Mail::to($sendmail)->send(new SendInvoice($products));
			toastr()->success('Product Details Successfully Sent on '.$sendmail.'');
			   }else{
				toastr()->warning('Product Details Not Sent');
            }
        //----------------------------    
    }
    //-----------------
    
    public function OrderStatusAndPaymentUpdate(Request $request){
        $allordstatus = explode(',', $request->allordstatus);
        $date = $request->date;
        $oid = $request->pid;
        $payment_status = $request->payment_status;
        $order_status = $request->order_status;
        $check_status = $request->check_status;
        $deliverycost = $request->deliveryCost;
        $etadate = $request->etadate;

        //$orderTrackingId = strtoupper(substr(sha1(mt_rand() . microtime()), mt_rand(0,15), 15));

        $orderTrackingId = $request->trackingid;
        
        
        
        $successMsg = '';
        $MsgText = '';
        $orderUpdate = Order::where('id', $oid)->first();

        if($order_status !== 'undefined'){
        $orderUpdate->order_status = $order_status;
        $MsgText = 'Order Status Successfully Changed';
        }

        if($payment_status !== 'undefined'){
        $orderUpdate->payment_status = $payment_status;
        $MsgText = 'Payment Status Successfully Changed';
        }

        if($check_status !== 'undefined'){

            if($check_status==2 || $check_status==3){
                $this->generateInvoicePDF($oid);
            $orderUpdate->checkStatus = $check_status;
            $orderUpdate->deliverycost_from_admin = $deliverycost;
            $orderUpdate->orderTrackingId = $orderTrackingId;
            $orderUpdate->ETA = $etadate;
            $MsgText = 'Status Successfully Changed'.'trackid: '.$orderTrackingId;
        }else if($check_status==1){
        $orderUpdate->checkStatus = $check_status; 
        //$orderUpdate->deliverycost_from_admin = '0.00';
       // $orderUpdate->orderTrackingId = NULL; 
        $MsgText = 'Status Successfully Changed';
        }
        }

        if($orderUpdate->save()){
        $successMsg = $MsgText;
        }else{
        $successMsg = 'Your Status Not Changed';
        }
        
       $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol;
          $setting = Setting::first();
          $orders = Order::with('user','diamondfeed','multiplierprice')
                        ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                        ->whereIn('order_status',  $allordstatus)
                        ->orderBy('order_date', 'desc')
                        ->paginate(10);
                        //->get();
        
        return view('backend.ordermanagements.order_component', [
            'cancelled'=>'cancelled',
            'orders' => $orders,
            'current_currency'=>$current_currency,
            'setting' => $setting,
            'symbol'=>$symbol,
            'successMsg'=> $successMsg,
            ]);

        //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$rate, 'successMsg'=> $successMsg]);
        }

    public function dateAndPaymentFilter(Request $request){
        $allordstatus = explode(',', $request->allordstatus);
       // $allordstatus = explode(',', $allordstatus);
        //print_r($ddde); die;
        $date = $request->date;
        $payment_status = $request->payment_status;
        $orderStatus = $request->get_order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
        $checkStatus = $request->check_status;
       
        $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
        $price_arr = $this->repository->get_currency();
        $rate = (array) $price_arr['rates'];
        $baserate = (array) $price_arr['base'];
        $current_currency = $rate[$currency->code];
        $symbol = $currency->symbol;
        $order = '';

        $setting = Setting::first();

        $query = Order::with('user','diamondfeed','multiplierprice');
        
        if($date !== "all"){
            $query->where('date', $date);
        } 

        if($payment_status !== "all"){
            $query->where('payment_status', $payment_status);
        }
        if($orderStatus !== "all"){
            $query->where('order_status', $orderStatus);
        }
        if($checkStatus !== "all"){
            $query->where('checkStatus', $checkStatus);
        }

        
        
        $orders = $query->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                        ->whereIn('order_status', $allordstatus)
                        ->orderBy('order_date', 'desc')
                        ->paginate(10);
                        //->get();
         
            return view('backend.ordermanagements.order_component', [
                'cancelled'=>'cancelled',
                'orders' => $orders,
                'current_currency'=>$current_currency,
               'setting' => $setting,
               'symbol'=>$symbol,
                ]);

        //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$rate]);
        } 
//=====---End-Order-request-ajax-function----====== 



//=====--Start-Enquiries-Section======================

public function enquiriesIndex(ManageOrderRequest $request)
{ 
         $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol;
     $orderStatus = [1];
     $setting = Setting::first();
    return new ViewResponse('backend.ordermanagements.enquiry',[
           'ordervalue'=>'OrderValue',
           //'orders'=>$this->repository->order($orderStatus),
           'orders'=>$this->repository->ordersAdmin($orderStatus),
           'current_currency'=>$current_currency,
               'setting' => $setting,
               'symbol'=>$symbol,
         ]);
}

public function EnqOrderStatusAndPaymentUpdate(Request $request){
    $allordstatus = explode(',', $request->allordstatus);
    $date = $request->date;
    $oid = $request->pid;
    $payment_status = $request->payment_status;
    $order_status = $request->order_status;
    $check_status = $request->check_status;
    $deliverycost = $request->deliveryCost;

    $orderTrackingId = "ererer54444hh";
    
    
    $successMsg = '';
    $MsgText = '';
    $orderUpdate = Order::where('id', $oid)->first();

    if($order_status !== 'undefined'){
    $orderUpdate->order_status = $order_status;
    $MsgText = 'Order Status Successfully Changed';
    }

    if($payment_status !== 'undefined'){
    $orderUpdate->payment_status = $payment_status;
    $MsgText = 'Payment Status Successfully Changed';
    }

    if($check_status !== 'undefined'){
        if($check_status==2 || $check_status==3){
        $orderUpdate->checkStatus = $check_status;
        $orderUpdate->deliverycost_from_admin = $deliverycost;
        $orderUpdate->orderTrackingId = $orderTrackingId;
        $MsgText = 'Status Successfully Changed'.'trackid: '.$orderTrackingId;
    }else if($check_status==1){
    $orderUpdate->checkStatus = $check_status; 
    //$orderUpdate->deliverycost_from_admin = '0.00';
   // $orderUpdate->orderTrackingId = NULL; 
    $MsgText = 'Status Successfully Changed';
    }
    }

    if($orderUpdate->save()){
    $successMsg = $MsgText;
    }else{
    $successMsg = 'Your Status Not Changed';
    }
    
   
         $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $baserate = (array) $price_arr['base'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol;
      $setting = Setting::first();
      $orders = Order::with('user','diamondfeed','multiplierprice')
                    ->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                    ->whereIn('order_status',  $allordstatus)
                    ->orderBy('order_date', 'desc')
                    ->paginate(10);
                    //->get();
    return view('backend.ordermanagements.enquiries_component', [
        'cancelled'=>'cancelled',
        'orders' => $orders,
        'current_currency'=>$current_currency,
        'setting' => $setting,
        'symbol'=>$symbol,
        'successMsg'=> $successMsg,
        ]);

    //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$rate, 'successMsg'=> $successMsg]);
    }

public function EnqdateAndPaymentFilter(Request $request){
    $allordstatus = explode(',', $request->allordstatus);
   // $allordstatus = explode(',', $allordstatus);
    //print_r($ddde); die;
    $date = $request->date;
    $payment_status = $request->payment_status;
    $orderStatus = $request->get_order_status;  //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
    $checkStatus = $request->check_status;
   
    $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
    $price_arr = $this->repository->get_currency();
    $rate = (array) $price_arr['rates'];
    $baserate = (array) $price_arr['base'];
    $current_currency = $rate[$currency->code];
    $symbol = $currency->symbol;
    
    $order = '';

    $setting = Setting::first();

    $query = Order::with('user','diamondfeed','multiplierprice');
    
    if($date !== "all"){
        $query->where('date', $date);
    } 

    // if($payment_status !== "all"){
    //     $query->where('payment_status', $payment_status);
    // }
    // if($orderStatus !== "all"){
    //     $query->where('order_status', $orderStatus);
    // }
    // if($checkStatus !== "all"){
    //     $query->where('checkStatus', $checkStatus);
    // }

    $orders = $query->where('status_from_admin', 1)    //Confirm=1, Unconfirm=2
                    ->whereIn('order_status', $allordstatus)
                    ->orderBy('order_date', 'desc')
                    ->paginate(10);
                    //->get();
         //print_r($orders); die;
        return view('backend.ordermanagements.enquiries_component', [
            'cancelled'=>'cancelled',
            'orders' => $orders,
            'current_currency'=>$current_currency,
            'setting' => $setting,
            'symbol'=>$symbol,
            ]);

    //return response()->json(['data'=>$order, 'setting' => $setting, 'current_currency'=>$rate]);
    } 
    
//=========Start-Notification-section============

    function notificationOrders(Request $request)
    {
        // Settings Details
        $orders = DB::table('orders')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->join('diamond_feeds', 'orders.diamondFeed_id', '=', 'diamond_feeds.id')
                    ->select('diamond_feeds.stock_id', 'users.first_name', 'users.last_name', 'orders.order_date', 'orders.order_status')
                    ->where('order_status', 4)
                    ->where('orders.seen_status', 0)
                    ->get();

        $totalOrders = @count($orders);            
    return response()->json(['orders'=>$orders, 'errcode'=>'404', 'totalorders'=>$totalOrders]);  
    }



    function notificationEnquiries(Request $request)
    {
        $enquiries = DB::table('orders')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->join('diamond_feeds', 'orders.diamondFeed_id', '=', 'diamond_feeds.id')
                    ->select('diamond_feeds.stock_id', 'users.first_name', 'users.last_name', 'orders.order_date', 'orders.order_status')
                    ->where('order_status', 1)
                    ->where('orders.seen_status', 0)
                    ->get();
    
          $totalEnquiries = @count($enquiries);            
        return response()->json(['enquiries'=>$enquiries, 'errcode'=>'404', 'totalenquiries'=>$totalEnquiries]);
        
    }

    function notificationUpdate(Request $request)
    {
        $order_status = $request->order_status;
        $seen_status = 1; 
        $message = ''; $rescode = ''; 
        $enquiries = DB::update('update orders set seen_status = ? where order_status = ? AND seen_status = ? ', [1, $order_status, 0]);  
        if($enquiries){
            $rescode = '200';
            $message = 'You are ready to read Data';
        }else{
            $rescode = '404';
            $message = 'You are not ready to read Data';  
        }         
        
        return response()->json(['rescode'=>$rescode, 'message'=>$message, 'order_status'=>$order_status]);
        
    }

//---------------------------------------

public function requestForImage(Request $request){
    $orderStatus = 6 ; // order_status = 6 for Image request

    $data = $this->repository->requestForImgVideo($orderStatus);
     //echo '<pre>'; print_r($data->toArray()); die;;
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('id', function($row){return 1;})
                    ->addColumn('customer', function($row){return $row->first_name.' '.$row->last_name;})
                    ->addColumn('certificate', function($row){
                        $btn = '<a href="'.$row->pdf.'">'.$row->lab.'</a>';
                         return $btn;
                      })
            
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url('admin/requestEditForm').'/'.$row->productID.'/'.$row->order_status.'" class="edit btn btn-primary btn-sm">Update Image</a>';
                            return $btn;
                    })
                    ->rawColumns(['action','certificate'])
                    ->make(true);
        }
       
        return view('backend.ordermanagements.requestimage');
}

public function requestForVideo(Request $request){
    $orderStatus = 7 ; // order_status = 6 for Image request

    $data = $this->repository->requestForVidImage($orderStatus);
     //echo '<pre>'; print_r($data->toArray()); die;;
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('id', function($row){return 1;})
                    ->addColumn('customer', function($row){return $row->first_name.' '.$row->last_name;})
                    ->addColumn('certificate', function($row){
                        $btn = '<a href="'.$row->pdf.'">'.$row->lab.'</a>';
                         return $btn;
                      })
            
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url('admin/requestEditForm').'/'.$row->productID.'/'.$row->order_status.'" class="edit btn btn-primary btn-sm">Update Video</a>';
                            return $btn;
                    })
                    ->rawColumns(['action','certificate'])
                    ->make(true);
        }
       
        return view('backend.ordermanagements.requestvideo');
}

public function requestForPdf(Request $request){
    $orderStatus = 8 ; // order_status = 6 for Image request

    $data = $this->repository->requestForCertificate($orderStatus);
     //echo '<pre>'; print_r($data->toArray()); die;;
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('id', function($row){return 1;})
                    ->addColumn('customer', function($row){return $row->first_name.' '.$row->last_name;})
                    ->addColumn('certificate', function($row){
                        $btn = '<a href="'.$row->pdf.'">'.$row->lab.'</a>';
                         return $btn;
                      })
            
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url('admin/requestEditForm').'/'.$row->productID.'/'.$row->order_status.'" class="edit btn btn-primary btn-sm">Update Certificate</a>';
                            return $btn;
                    })
                    ->rawColumns(['action','certificate'])
                    ->make(true);
        }
       
        return view('backend.ordermanagements.requestpdf');
}

//----------------------------
public function requestEditForm(Request $request, $productID = '', $orderStatus = ''){
        return view('backend.ordermanagements.edit', [
            'orderStatus' => $orderStatus,
            'productID' => $productID, 
        ]);
}

public function updateReq(Request $request){
        $orderStatus = $request->orderStatus;
        $id = $request->productID;
        $redirectURL = '';
        $updatesuccess = '';
        if($orderStatus == 6 && !empty($request->image)){
        $updatesuccess = DB::update('update diamond_feeds SET image = ? where id = ? ', [$request->image, $id]); 
        $redirectURL = redirect('admin/requestForImage');
        }
        
        if($orderStatus == 7 && !empty($request->video)){
        $updatesuccess = DB::update('update diamond_feeds SET video = ? where id = ? ', [$request->video, $id]); 
        $redirectURL = redirect('admin/requestForVideo'); 
        }
        
        if($orderStatus == 8 && !empty($request->pdf)){
        $updatesuccess = DB::update('update diamond_feeds SET pdf = ? where id = ? ', [$request->pdf, $id]); 
        $redirectURL = redirect('admin/requestForPdf');  
        }
        
        if($updatesuccess){
			toastr()->success('Request Updated Successfully');
		}else{
			toastr()->warning('Not Update');
        }
        
       //print_r($order); die;

        return $redirectURL;

    }


//-------------------------






//=========End-notification-section===========
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
