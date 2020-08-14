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
use App\Models\Currency;
use App\Models\Orders\Order;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;



use Illuminate\Pagination\Paginator;

/**
 * Class FrontendController.
 */
class ProductController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
		// Add
    }
	public function get_currency(){
		$client = new \GuzzleHttp\Client();     
		// Create a request
		$res = $client->get('https://api.exchangeratesapi.io/latest?base=USD');
		// Get the actual response without headers
		$response =  $res->getBody();
	    $aa= (array) json_decode($response);
	    return $aa;
	}
	
	public function send_notification(Request $request){
		//print_r('csdfs'); die;
		$email_id = 'shivaniguptawebtech@gmail.com';
		//Notification::send($email_id, new Enquire($email_id
		Notification::route('mail', $email_id)->notify(new Enquire($email_id));
		
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

	public function ourProduct(Request $request,  $base = null){
		
	  $multiplier = $this->multiplier(); 
	//$products = DB::table('diamond_feeds')->take(20)->get();
	//   foreach($products as $product){
	// 		echo $product->stock_id.'====';
	// 		echo $product->price.'====';
	// 		foreach($multiplier as $mlusd){
	// 			if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd){
	// 			echo $mlusd->multiplier_usd;	
	// 			}
	// 		}
	// 		echo '<br>';
	//          }				
	//   echo '<pre>'; print_r($multiplier->toArray());				
	// 	die;


		$setting = Setting::first();
		$base = Auth::user()->currency_code;
		//print_r("Auth ID : ".$id); die;
		$allcurrency = Currency::where('code', $base)->first();
		$code = $allcurrency['code'];
		$symbol = $allcurrency['symbol']; 
		
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];

		$current_currency = $rate[$code];
		
		// echo '<pre>';
		// print_r($price_arr); die; 
		// print_r($rate['USD']);
		// die;

		// if($base == 'EUR' ){
		// 	$symbol ='€';
		// 	$current_currency = $rate['EUR'];
		// }elseif($base == 'GBP'){
		// 	$symbol ='£';
		// 	$current_currency = $rate['GBP'];
		// }else{
		// 	$symbol ='$';
		// 	$current_currency = $rate['USD'];
		// }
		// ->paginate(15);
		$request->session()->put('current_currency',$current_currency);
		$request->session()->put('symbol',$symbol);
		
		//$products = DB::table('diamond_feeds')->take(100)->get();

		$products = DiamondFeed::sortable()->orderBy('price', 'asc')->paginate(25);

	//	$products = DB::table('diamond_feeds')->select('*');
        //$aa=  datatables()->of($products)
            //->make(true);
	   // print_r($aa); die;
	   $total_diamond_found = DB::table('diamond_feeds')->count();
		//print_r($total_diamond_found); die;
       return view('frontend.pages.our_products', compact('products' ,$products , 'multiplier', $multiplier, 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found, 'setting', $setting))->render();
	  }
   
	 public function SearchourProduct(Request $request,  $base = null){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		//$stc = ['LD200110653','LD200110224','G431-138852'];
		$stockId = $request->search_stock_number;  
		$sid = explode(",", $stockId);
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];
		if($base == 'EUR' ){
			$symbol ='€';
			$current_currency = $rate['EUR'];
		}elseif($base == 'GBP'){
			$symbol ='£';
			$current_currency = $rate['GBP'];
		}else{
			$symbol ='$';
			$current_currency = $rate['USD'];
		}
		// ->paginate(15);
		$request->session()->put('current_currency',$current_currency);
		$request->session()->put('symbol',$symbol);
		
		//$products = DB::table('diamond_feeds')->where('stock_id', $stockId)->get();
		$products = DB::table('diamond_feeds')->whereIn('stock_id', $sid)->paginate(25);
		//dd($products); die;
	   $total_diamond_found = DB::table('diamond_feeds')->whereIn('stock_id', $sid)->count();
		//print_r($total_diamond_found); die;
       return view('frontend.pages.search_products', compact('products' ,$products , 'multiplier', $multiplier, 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found, 'stockId', $stockId, 'setting', $setting));
	  }
   	  
	
	public function ajax_get_products(Request $request){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		$base = Auth::user()->currency_code;
		$allcurrency = Currency::where('code', $base)->first();
		$code = $allcurrency['code'];
		$symbol = $allcurrency['symbol']; 
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];
		$current_currency = $rate[$code];
		//============================================
	    	$query = DiamondFeed::sortable();
	    	 if(!empty($_GET['shape_arr'])){
				//print_r($_GET['shape_arr']);  die; 
			    $query->whereIn('shape', $_GET['shape_arr']);
		    }
		    if(($_GET['max_price1'] != '') && ($_GET['min_price1'] != '') ){
		        $query->whereBetween('carats', [$_GET['min_price1'] , $_GET['max_price1'] ]);
			}

			if(($_GET['max_price'] != '') && ($_GET['min_price'] != '') ){
		        $query->whereBetween('price', [$_GET['min_price'] , $_GET['max_price'] ]);
			}
			
		    if(!empty($_GET['cut_div_val'])){
		        $query->whereIn('cut',$_GET['cut_div_val']);
		    }else{
				$query;	  
			}
		    if(!empty($_GET['color_div_val'])){
				//print_r($_GET['color_div_val']); die; 
		        $query->whereIn('col', $_GET['color_div_val']);
			}else{
				$query;	
			}
		    if(!empty($_GET['cla_div_val'])){
		        $query->whereIn('clar', $_GET['cla_div_val']);
		    }else{
				$query;	
			}
		    if(!empty($_GET['certi_div_val'])){
		       $query->whereIn('lab', $_GET['certi_div_val']);
		    }else{
				$query;	
			}
		    
		    if(!empty($_GET['pol_div_val'])){
		        $query->whereIn('pol', $_GET['pol_div_val']);
		    }else{
				$query;	
			}
	        if(!empty($_GET['flo_div_val'])){
	           $query->whereIn('flo', $_GET['flo_div_val']);
	        }else{
				$query;	
			}
	        if(!empty($_GET['sym_div_val'])){
	           $query->whereIn('symm', $_GET['sym_div_val']);
	        }else{
				$query;	
			}
			//--------------------
			// if($_GET['short_data_clarity_asc'] = 'asc'){
			// 	$query->orderBy('clar', 'desc');
			// }else{
			// 	$query->orderBy('clar', 'asc');
			// }
			//--------------------
	        
	        if(($_GET['max_depth'] != '') && ($_GET['min_depth'] != ''))
		    {
		        $query->whereBetween('depth', [$_GET['min_depth'],$_GET['max_depth']]);
			}
    
    		if(($_GET['max_table'] != '') && ($_GET['min_table'] != '' ))
            {
    		     $query->whereBetween('table' , [$_GET['min_table'], $_GET['max_table']]);
    		    
    		}
		 
    		if(($_GET['min_ratio'] != '') && ($_GET['max_ratio'] != '') ){
				$min = $_GET['min_ratio'];
				$max = $_GET['max_ratio'];
				//$query->where([['length','=',$_GET['min_ratio'] ] , ['width','=',$_GET['min_ratio'] ] ]);
				$query->whereBetween('lwratio' , [$min, $max]);
    		 }
    		
			 $total_diamond_found = $query->count();
			$products = $query->orderBy('price', 'asc')->paginate(25);
			
	    	
		    return view('frontend.pages.component.product_component', compact('products' ,$products , 'multiplier', $multiplier, 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found, 'setting', $setting));

	}	
	 public function productDetail(Request $request ,$id){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		$product_details = DB::table('diamond_feeds')->where('id', $id)->first();
		$current_currency = $request->session()->get('current_currency');
		$symbol = $request->session()->get('symbol');
        return view('frontend.pages.products_details', compact('product_details' ,$product_details , 'multiplier', $multiplier, 'current_currency' ,$current_currency , 'symbol' , $symbol, 'setting', $setting));
	}

	public function EnquirySend(Request $request){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		//print_r($request->diamondFeed_id); die; 
		$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
		$order = new Order();
		$order->user_id = Auth::user()->id; 
		$order->diamondFeed_id = $request->diamondFeed_id;
		$order->client = $request->client;
		$order->ref_name_contact = $request->reference;
		$order->userEmail = $request->userEmail; 
		$order->order_status = 1; //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
		$order->multiplier_id = $request->multiplier_usd;
		$order->order_date = $dateTime->format("d/m/Y  h:i A");		   
		$order->date = date('m_Y');
		if($order->save()){
			toastr()->success('Order Successfully Sent');
		}else{
			toastr()->warning('Order Not Sent');
		}
		//---------start-mail-section-------------
		if($request->userEmail !== ''){	
            $enquiry = [
				'username'=> Auth::user()->name,
				'productid'=> $request->diamondFeed_id, 
				'subject' => 'Product Enquiry',
				'stock_number' => $request->stock_number,
				'setting'=> $setting,
            ];
            $mail = Mail::to($request->userEmail)->send(new SendMailable($enquiry));
			   }	
	   //---------End-mail-section-------------		   
		//$order->save();
		
		
		// print_r($request->email); die;
	   //return redirect('our-products');
	   return redirect('our-products');
	   
	  }



	  public function OrderSend(Request $request){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		//print_r($request->diamondFeed_ido); die; 
		$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
		$order = new Order();
		$order->user_id = Auth::user()->id; 
		$order->diamondFeed_id = $request->diamondFeed_ido;
		$order->client = $request->cliento;
		$order->ref_name_contact = $request->referenceo;
		$order->userEmail = $request->userEmailo; 
		$order->order_status = 4; //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
		$order->multiplier_id = $request->multiplier_usdo;
		$order->order_date = $dateTime->format("d/m/Y  h:i A");		   
		$order->date = date('m_Y');
		if($order->save()){
			toastr()->success('Order Successfully Sent');
		}else{
			toastr()->warning('Order Not Sent');
		}
		//---------start-mail-section-------------
		if($request->userEmailo !== ''){	
            $enquiry = [
				'username'=> Auth::user()->name,
				'productid'=> $request->diamondFeed_ido, 
				'subject' => 'Product Order',
				'stock_number' => $request->stock_numbero,
				'setting'=> $setting,
            ];
            $mail = Mail::to($request->userEmailo)->send(new SendMailable($enquiry));
			   }	
	   //---------End-mail-section-------------		   
		//$order->save();
		
		
		// print_r($request->email); die;
	   //return redirect('our-products');
	   return redirect('our-products');
	   
	  }

	  //-----------------------------
	

}
