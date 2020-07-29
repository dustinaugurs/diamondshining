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
use App\Models\Currency;


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

	public function ourProduct(Request $request,  $base = null){
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
       return view('frontend.pages.our_products', compact('products' ,$products , 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found))->render();
	  }
   
	 public function SearchourProduct(Request $request,  $base = null){
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
       return view('frontend.pages.search_products', compact('products' ,$products , 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found, 'stockId', $stockId));
	  }
   	  
	
	public function ajax_get_products(Request $request){
		$base = Auth::user()->currency_code;
		//print_r("Auth ID : ".$id); die;
		
		$allcurrency = Currency::where('code', $base)->first();
		$code = $allcurrency['code'];
		$symbol = $allcurrency['symbol']; 
		
		$price_arr = $this->get_currency();
		$rate = (array) $price_arr['rates'];

		$current_currency = $rate[$code];
		// ->paginate(15);
		$request->session()->put('current_currency',$current_currency);
		$request->session()->put('symbol',$symbol);

	    	$query = DiamondFeed::sortable();
	    	 if(!empty($_GET['shape_arr'])){
		         $query->whereIn('shape', $_GET['shape_arr']);
		    }
		    if(($_GET['max_price1'] != '') && ($_GET['min_price1'] != '') ){
		        $query->whereBetween('carats', [$_GET['min_price1'] , $_GET['max_price1'] ]);
			}
			
		    if(!empty($request->max_price) && !empty($request->min_price) ){
		        $query->whereBetween('price', [$request->min_price , $request->max_price]);
		    }
		    if($_GET['cut_div_val'] !=  ''){
		        $query->where('cut',$_GET['cut_div_val']);
		    }else{
				$query;	
			}
		    if(($_GET['color_div_val'] != '')){
		        $query->where('col', $_GET['color_div_val']);
			}else{
				$query;	
			}
		    if(($_GET['cla_div_val'] != '')){
		        $query->where('clar', $_GET['cla_div_val']);
		    }else{
				$query;	
			}
		    if($_GET['certi_div_val']  != ''){
		       $query->where('lab', $_GET['certi_div_val']);
		    }else{
				$query;	
			}
		    
		    if($_GET['pol_div_val'] != ''){
		        $query->where('pol', $_GET['pol_div_val']);
		    }else{
				$query;	
			}
	        if($_GET['flo_div_val'] != ''){
	           $query->where('flo', $_GET['flo_div_val']);
	        }else{
				$query;	
			}
	        if($_GET['sym_div_val'] != ''){
	           $query->where('symm', $_GET['sym_div_val']);
	        }else{
				$query;	
			}
			//--------------------
			if($_GET['short_data_clarity_asc'] = 'asc'){
				$query->orderBy('clar', 'desc');
			}else{
				$query->orderBy('clar', 'asc');
			}
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
    		
    	  // DB::enableQueryLog();
			//$products = $query->take(1000)->get();
			$products = $query->orderBy('price', 'asc')->sortable()->paginate(25);
			$total_diamond_found = $query->count();
	    	//echo "<pre>";
	     //print_r($min.'Max='.$max);exit;
	     //exit;
	    //	dd(DB::getQueryLog());
		    return view('frontend.pages.component.product_component', compact('products' ,$products , 'current_currency' , $current_currency ,'symbol' ,$symbol, 'total_diamond_found' , $total_diamond_found));

	}	
	 public function productDetail(Request $request ,$id){
		$product_details = DB::table('diamond_feeds')->where('id', $id)->first();
		$current_currency = $request->session()->get('current_currency');
		$symbol = $request->session()->get('symbol');
        return view('frontend.pages.products_details', compact('product_details' ,$product_details , 'current_currency' ,$current_currency , 'symbol' , $symbol));
    }
}
