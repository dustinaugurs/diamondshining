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
		
		$products = DB::table('diamond_feeds')->take(100)->get();
	//	$products = DB::table('diamond_feeds')->select('*');
        //$aa=  datatables()->of($products)
            //->make(true);
       // print_r($aa); die;
       return view('frontend.pages.our_products', compact('products' ,$products , 'current_currency' , $current_currency ,'symbol' ,$symbol));
	  }
	
	public function ajax_get_products(Request $request){
	   // echo "<pre>";
	   //print_r($request->all());exit;
	    	$symbol ='$';
			$current_currency = 0;

	    	$query = DB::table('diamond_feeds');
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
		    }
		    if(($_GET['color_div_val'] != '')){
		        $query->where('col', $_GET['color_div_val']);
		    }
		    if(($_GET['cla_div_val'] != '')){
		        $query->where('clar', $_GET['cla_div_val']);
		    }
		    if($_GET['certi_div_val']  != ''){
		       $query->where('lab', $_GET['certi_div_val']);
		    }
		    
		    if($_GET['pol_div_val'] != ''){
		        $query->where('pol', $_GET['pol_div_val']);
		    }
	        if($_GET['flo_div_val'] != ''){
	           $query->where('flo', $_GET['flo_div_val']);
	        }
	        if($_GET['sym_div_val'] != ''){
	           $query->where('symm', $_GET['sym_div_val']);
	        }
	        
	        if(($_GET['max_depth'] != '') && ($_GET['min_depth'] != ''))
		    {
		        $query->whereBetween('depth', [$_GET['min_depth'],$_GET['max_depth']]);
			}
    
    		if(($_GET['max_table'] != '') && ($_GET['min_table'] != '' ))
            {
    		     $query->whereBetween('table' , [$_GET['min_table'], $_GET['max_table']]);
    		    
    		}
		 
    		if(($_GET['min_ratio'] != '') && ($_GET['max_ratio'] != '') ){
    		    $query->where([['length','=',$_GET['min_ratio'] ] , ['width','=',$_GET['min_ratio'] ] ]);
    		   
    		 }
    		
    	  // DB::enableQueryLog();
	    	$products = $query->take(1000)->get();
	    //	echo "<pre>";
	    // print_r($products);exit;
	     //exit;
	    //	dd(DB::getQueryLog());
		    return view('frontend.pages.component.product_component', compact('products' ,$products , 'current_currency' , $current_currency ,'symbol' ,$symbol));

	}	
	 public function productDetail(Request $request ,$id){
		$product_details = DB::table('diamond_feeds')->where('id', $id)->first();
		$current_currency = $request->session()->get('current_currency');
		$symbol = $request->session()->get('symbol');
        return view('frontend.pages.products_details', compact('product_details' ,$product_details , 'current_currency' ,$current_currency , 'symbol' , $symbol));
    }
}
