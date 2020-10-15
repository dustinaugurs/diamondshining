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
use App\Mail\SendMailableProduct;
use App\Models\MeleeDiamonds\MeleeDiamond;

use PDF;
use App;

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
		$meleediamondRound = MeleeDiamond::where('shape', 'ROUND')->get();
		$meleediamondPrincess = MeleeDiamond::where('shape', 'PRINCESS')->get();
		$setting = Setting::first();
		$base = Auth::user()->currency_code;
		$allcurrency = Currency::where('code', $base)->first();
		$code = $allcurrency['code'];
		$symbol = $allcurrency['symbol']; 
		
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];

		$current_currency = $rate[$code];
		$request->session()->put('current_currency',$current_currency);
		$request->session()->put('symbol',$symbol);
		$products = DiamondFeed::sortable()->where('active', 1)->orderBy('price', 'asc')->paginate(25);
	   $total_diamond_found = DB::table('diamond_feeds')->where('active', 1)->count();
       return view('frontend.pages.our_products', compact('products' ,$products , 'multiplier', $multiplier, 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found, 'setting', $setting, 'meleediamondRound', $meleediamondRound, 'meleediamondPrincess', $meleediamondPrincess ))->render();
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
		$products = DB::table('diamond_feeds')->where('active', 1)->whereIn('stock_id', $sid)->paginate(25);
		//dd($products); die;
	   $total_diamond_found = DB::table('diamond_feeds')->where('active', 1)->whereIn('stock_id', $sid)->count();
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
		    if(!empty($_GET['max_price1']) && !empty($_GET['min_price1']) ){
		        $query->whereBetween('carats', [$_GET['min_price1'] , $_GET['max_price1'] ]);
			}

			if(!empty($_GET['max_price']) && !empty($_GET['min_price']) ){
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
	        
	        if(!empty($_GET['max_depth']) && !empty($_GET['min_depth']))
		    {
		        $query->whereBetween('depth', [$_GET['min_depth'],$_GET['max_depth']]);
			}
    
    		if(!empty($_GET['max_table']) && !empty($_GET['min_table']))
            {
    		     $query->whereBetween('table' , [$_GET['min_table'], $_GET['max_table']]);
    		    
    		}
		 
    		if(!empty($_GET['min_ratio']) && !empty($_GET['max_ratio']) ){
				$min = $_GET['min_ratio'];
				$max = $_GET['max_ratio'];
				//$query->where([['length','=',$_GET['min_ratio'] ] , ['width','=',$_GET['min_ratio'] ] ]);
				$query->whereBetween('lwratio' , [$min, $max]);
    		 }
    		
			 $total_diamond_found = $query->where('active', 1)->count();
			$products = $query->where('active', 1)->orderBy('price', 'asc')->paginate(25);
			
	    	
		    return view('frontend.pages.component.product_component', compact('products' ,$products , 'multiplier', $multiplier, 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found, 'setting', $setting));

	}	
	 public function productDetail(Request $request ,$id){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		$product_details = DB::table('diamond_feeds')->where('active', 1)->where('id', $id)->first();
		$current_currency = $request->session()->get('current_currency');
		$symbol = $request->session()->get('symbol');
        return view('frontend.pages.products_details', compact('product_details' ,$product_details , 'multiplier', $multiplier, 'current_currency' ,$current_currency , 'symbol' , $symbol, 'setting', $setting));
	}

	public function EnquirySend(Request $request){
		//echo '<pre>'; print_r($request->all()); die; 
		$deliveryaddress = $request->qdeliveryaddress;  // otherAddress, sameAddress
	//----------------
	$auth = Auth::user();
	$saddressline_1 = $request->qaddressline_1;
	$saddressline_2 = $request->qaddressline_2; 
	$saddressline_3 = $request->qaddressline_3;
	$scity = $request->qcity; 
	$sstate = $request->qstate; 
	$scountry = $request->qcountry;
	$szip = $request->qzip;
	if(!empty($deliveryaddress)){
	if($deliveryaddress == 'sameAddress'){
		$auth->address_line1 = $saddressline_1;	
		$auth->address_line2 = $saddressline_2;	
		$auth->address_line3 = $saddressline_3;	
		$auth->city = $scity;
		$auth->state = $sstate;
		$auth->country = $scountry;	
		$auth->zip = $szip;
		$auth->save();
	} }
	//-------------
	$oaddressline_1 = $request->qoaddressline_1;
	$oaddressline_2 = $request->qoaddressline_2; 
	$oaddressline_3 = $request->qoaddressline_3;
	$ocity = $request->qocity; 
	$ostate = $request->qostate; 
	$ocountry = $request->qocountry;
	$ozip = $request->qozip; 
	//--------------- 
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		//print_r($request->diamondFeed_id); die; 
		$dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
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
		$order->c_symbol = $request->c_symbol; 
		$order->p_finalprice = $request->p_finalprice; 
		$order->p_price_without_vat = $request->p_price_without_vat;
		$order->p_vat = $request->p_vat;
		$order->VATnumber = $request->vatnumber;
		if(!empty($deliveryaddress)){
			if($deliveryaddress == 'otherAddress'){
				$order->delivery_location = 'otherAddress'; 
				$order->address_line1 = $oaddressline_1;	
				$order->address_line2 = $oaddressline_2;	
				$order->address_line3 = $oaddressline_3;	
				$order->city = $ocity;
				$order->state = $ostate;
				$order->country = $ocountry;	
				$order->zip = $ozip;
			}else{
				$order->delivery_location = 'sameAddress'; 
			} 
		}
		    $message = '';
			$statusCode = '';
			$status = '';
			if($order->save()){
				$message = 'Enquiry Successfully Sent';
				$statusCode = 200;
				$status = 'Success';
			}else{
				$message = 'Enquiry Not Sent';
				$statusCode = 400;
				$status = 'Failed';
			}
		//---------start-mail-section-------------
		$diamondfeed = DiamondFeed::where('id', $request->diamondFeed_id)->where('stock_id', $request->stock_number)->first();
		if($request->userEmail !== ''){	
            $enquiry = [
				'username'=> Auth::user()->name,
				'productid'=> $request->diamondFeed_id, 
				'subject' => 'ENQUIRY - CHRIS POTHECARY ( '.Auth::user()->name.' ) - '.$diamondfeed->lab.' '.$diamondfeed->ReportNo,
				'message' => 'We have received your enquiry for the following diamond. We will check the availability and quality of this diamond and revert back to you as soon at the earliest opportunity.',
				'stock_number' => $request->stock_number,
				'certificate_number' => '<a href="'.$diamondfeed->pdf.'">'.$diamondfeed->ReportNo.'</a>',
				'shape' => $diamondfeed->shape,
				'carat' => $diamondfeed->carats,
				'colour' => $diamondfeed->col,
				'clarity'=> $diamondfeed->clar,
				'price' => $request->c_symbol.''.$request->p_finalprice,
				'setting'=> $setting,
            ];
            $mail = Mail::to($request->userEmail)->cc(['enquries@shiningqualities.com'])->send(new SendMailable($enquiry));
			   }	
	   //---------End-mail-section-------------		   
		//$order->save();
		$data = [
			'message' => $message,
			'statusCode' => $statusCode, 
			'status' => $status,  
		 ];
		
		
		// print_r($request->email); die;
	   //return redirect('our-products');
	   return response()->json(['data'=>$data]);
	   
	  }



	  public function OrderSend(Request $request){
		//echo '<pre>'; print_r($request->all()); die;
		
	$deliveryaddress = $request->deliveryaddress;  // otherAddress, sameAddress
	//----------------
	$auth = Auth::user();
	$saddressline_1 = $request->addressline_1;
	$saddressline_2 = $request->addressline_2; 
	$saddressline_3 = $request->addressline_3;
	$scity = $request->city; 
	$sstate = $request->state; 
	$scountry = $request->country;
	$szip = $request->zip;
	if(!empty($deliveryaddress)){
	if($deliveryaddress == 'sameAddress'){
		$auth->address_line1 = $saddressline_1;	
		$auth->address_line2 = $saddressline_2;	
		$auth->address_line3 = $saddressline_3;	
		$auth->city = $scity;
		$auth->state = $sstate;
		$auth->country = $scountry;	
		$auth->zip = $szip;
		$auth->save();
	} }
	//-------------
	$oaddressline_1 = $request->oaddressline_1;
	$oaddressline_2 = $request->oaddressline_2; 
	$oaddressline_3 = $request->oaddressline_3;
	$ocity = $request->ocity; 
	$ostate = $request->ostate; 
	$ocountry = $request->ocountry;
	$ozip = $request->ozip; 
	//---------------     
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		//print_r($request->diamondFeed_ido); die; 
		$dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
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
		$order->c_symbol = $request->c_symbolo; 
		$order->p_finalprice = $request->p_finalpriceo; 
		$order->p_price_without_vat = $request->p_price_without_vato;
		$order->p_vat = $request->p_vato;
		$order->VATnumber = $request->vatnumbero;
		if(!empty($deliveryaddress)){
			if($deliveryaddress == 'otherAddress'){
				$order->delivery_location = 'otherAddress'; 
				$order->address_line1 = $oaddressline_1;	
				$order->address_line2 = $oaddressline_2;	
				$order->address_line3 = $oaddressline_3;	
				$order->city = $ocity;
				$order->state = $ostate;
				$order->country = $ocountry;	
				$order->zip = $ozip;
			}else{
				$order->delivery_location = 'sameAddress'; 
			} 
		}
		    $message = '';
			$statusCode = '';
			$status = '';
		if($order->save()){
			$message = 'Order Successfully Sent';
			$statusCode = 200;
			$status = 'Success';
		}else{
			$message = 'Order Not Sent';
			$statusCode = 400;
			$status = 'Failed';
		}
		//---------start-mail-section-------------
		$diamondfeed = DiamondFeed::where('id', $request->diamondFeed_ido)->where('stock_id', $request->stock_numbero)->first();
		if($request->userEmailo !== ''){	
            $enquiry = [
				'username'=> Auth::user()->name,
				'productid'=> $request->diamondFeed_ido, 
				'subject' => 'ORDER REQUEST - CHRIS POTHECARY ( '.Auth::user()->name.' ) - '.$diamondfeed->lab.' '.$diamondfeed->ReportNo,
				'message' => 'We have received your order request for the following diamond. We will check the availability and quality of this diamond and revert back to you as soon at the earliest opportunity.',
				'stock_number' => $request->stock_numbero,
				'certificate_number' => '<a href="'.$diamondfeed->pdf.'">'.$diamondfeed->ReportNo.'</a>',
				'shape' => $diamondfeed->shape,
				'carat' => $diamondfeed->carats,
				'colour' => $diamondfeed->col,
				'clarity'=> $diamondfeed->clar,
				'price' => $request->c_symbolo.''.$request->p_finalpriceo,
				'setting'=> $setting,
            ];
            $mail = Mail::to($request->userEmailo)->cc(['enquries@shiningqualities.com'])->send(new SendMailable($enquiry));
			   }	
	   //---------End-mail-section-------------		   
		//$order->save();
		$data = [
			'message' => $message,
			'statusCode' => $statusCode, 
			'status' => $status,  
		 ];
		
		
		// print_r($request->email); die;
	   //return redirect('our-products');
	   return response()->json(['data'=>$data]);
	   
	  }
	  //-----------------------------
	 
	  public function CopySend(Request $request){
		$multiplier = $this->multiplier(); 
		$setting = Setting::first();
		//echo '<pre>'; print_r($request->all()); die; 
		$dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
		$user = Auth::user()->id; 
		$diamondFeed_id = $request->diamondFeed_idc;
		$client = $request->clientc;
		$ref_name_contact = $request->referencec;
		$userEmail = $request->userEmailc; 
		$order_status = 1; //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5 
		$multiplier_id = $request->multiplier_usdc;
		$order_date = $dateTime->format("d/m/Y  h:i A");		   
		$date = date('m_Y');
		$mydata = DB::table('diamond_feeds')->where('id', $diamondFeed_id)->first();
		$vat = $setting->VAT;
		$code = Auth::user()->currency_code;
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];
        $current_currency = $rate[$code];
        $symbol = Auth::user()->currency_symbol;

   $price = ($mydata->price * $multiplier_id)+($mydata->price * $multiplier_id)*$setting->VAT/100;
   $finalPrice = $symbol.''.number_format(floor(($current_currency * ($price))*100)/100,2, '.', '');

   //print_r($finalPrice); die;

		$products = [
			'username'=> Auth::user()->name,
			'productid'=> $request->diamondFeed_idc, 
			'subject' => 'DETAILS SHARED - CHRIS POTHECARY - '.$mydata->lab.' '.$mydata->ReportNo,
			'message' => 'Please find attached a PDF document containing details for the diamond requested.',
			'stock_number' => $request->stock_numberc,
			'certificate_number' => '<a href="'.$mydata->pdf.'">'.$mydata->ReportNo.'</a>',
			'shape' => $mydata->shape,
			'carat' => $mydata->carats,
			'colour' => $mydata->col,
			'clarity'=> $mydata->clar,
			'price' => $finalPrice,
			'pdfname' => $request->stock_numberc.date('d-m-Y h:i:s'),
			'setting'=> $setting,
			//'attachment' => $attachment,
			'email' => $request->userEmailc,
			'data' => $mydata,
			'multiplier'=> $multiplier_id,
		];
		//---------start-mail-section-------------
		    $message = '';
			$statusCode = '';
			$status = '';
		if($request->userEmailc !== ''){	
			$mail = Mail::to($request->userEmailc)->cc(['enquries@shiningqualities.com'])->send(new SendMailableProduct($products));
			$message = 'Product Details Successfully Sent on '.$request->userEmailc.'';
			$statusCode = 200;
			$status = 'Success';
			   }else{
			$message = 'Product Details Not Sent';
			$statusCode = 400;
			$status = 'Failed';
			}
			$data = [
			   'message' => $message,
			   'statusCode' => $statusCode, 
			   'status' => $status,  
			];
	   //---------End-mail-section-------------	
	   return response()->json(['data'=>$data]);	   
	   //return redirect('our-products');
	  }


	 //---------------------------------
	 
	 public function imageVideoRequest(Request $request){
		//print_r($request->all()); die;
		$requestStatus = '';
		$productID = '';
		$reqmsg = '';
		if(!empty($request->imgproductID) && !empty($request->imgstatus)){
			$productID = $request->imgproductID;
			$requestStatus = $request->imgstatus; 	
		}
		if(!empty($request->videoproductID) && !empty($request->videostatus)){
			$productID = $request->videoproductID;
			$requestStatus = $request->videostatus; 
		}
		if(!empty($request->pdfproductID) && !empty($request->pdfstatus)){
			$productID = $request->pdfproductID;
			$requestStatus = $request->pdfstatus; 
		}
		if($requestStatus == 6){
            $reqmsg = 'Image';
		}elseif($requestStatus == 7){
			$reqmsg = 'Video'; 
		}elseif($requestStatus == 8){
			$reqmsg = 'Certificate'; 
		}else{
		    $reqmsg = '';	
		}

		$dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
		$productrequest = new Order();
		$productrequest->user_id = Auth::user()->id; 
		$productrequest->diamondFeed_id = $productID;
		$productrequest->userEmail = Auth::user()->email;
		$productrequest->client = Auth::user()->first_name.' '.Auth::user()->last_name;  
		$productrequest->order_status = $requestStatus; //Image Request=6, Video Request=7, 
		$productrequest->order_date = $dateTime->format("d/m/Y  h:i A");		   
		$productrequest->date = date('m_Y');
	
		if($productrequest->save()){
			toastr()->success('Thank You, I will Update Your '.$reqmsg.' Request Very Soon');
		}else{
			toastr()->warning('Not Sent');
		}
	   return redirect('our-products');
	   
	  }


	  //------------------------


	  //----------------------------
	

}
