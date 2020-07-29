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

use Illuminate\Pagination\Paginator;

/**
 * Class FrontendController.
 */
class EnquiryOrderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
   
	public function index(Request $request){
		
		$products = DiamondFeed::sortable()->orderBy('price', 'asc')->paginate(10);
		
       return view('frontend.pages.enquiry_order', [
          'order'=>'Order',
        'products'=>$products ,
       ]);
           
      }
      

public function orders(Request $request){
		
		$products = DiamondFeed::sortable()->orderBy('price', 'asc')->paginate(10);
		
       return view('frontend.pages.component.order_component', [
         'order'=>'Order',
        'products'=>$products ,
       ]);
           
      }
      
      public function enquiries(Request $request){
		
		$products = DiamondFeed::sortable()->orderBy('price', 'asc')->paginate(10);
		 $enq = 'enquiry';
       return view('frontend.pages.component.enquiries_component', [
         'enquiry'=>$enq,
        'products'=>$products ,
       ]);
           
      } 
      
      public function ordersCompleted(Request $request){
		
		$products = DiamondFeed::sortable()->orderBy('price', 'asc')->paginate(10);
		
       return view('frontend.pages.component.order_completed_component', [
         'completed'=>'completed',
        'products'=>$products ,
       ]);
           
      }
      
      public function ordersCancelled(Request $request){
		
		$products = DiamondFeed::sortable()->orderBy('price', 'asc')->paginate(10);
		
       return view('frontend.pages.component.order_cancelled_component', [
         'cancelled'=>'cancelled',
        'products'=>$products ,
       ]);
           
	  }
   
	 
   	  
	
	
    
    
	 
}
