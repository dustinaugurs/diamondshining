<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use DB;
use Illuminate\Pagination\Paginator;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.index', compact('google_analytics', $google_analytics));
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug='', PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }

    public function contactUs (){

        return view('frontend.pages.contact_us');
    }
	 public function ourProduct(){
		// ->paginate(15);
		$products = DB::table('diamond_feeds__')->get();
		//print_r($products); die;
        return view('frontend.pages.our_products', compact('products' ,$products));
		}
	public function ajax_get_products(){
		print_r($_GET['cut_div_val']); die;
		if(!empty($_GET['shape_arr']))
		{
			$shape_arr = $_GET['shape_arr'];	
			$products = DB::table('diamond_feeds__')->whereIn('shape', $shape_arr)->get();
		    return view('frontend.pages.component.product_component', compact('products' ,$products));
		}
		if(!empty($_GET['max_price']) && !empty($_GET['min_price']) )
		{
			$max_price = $_GET['max_price'];
            $min_price = $_GET['min_price'];
			$products = DB::table('diamond_feeds__')->whereBetween('price', [$min_price, $max_price])->get();
		    return view('frontend.pages.component.product_component', compact('products' ,$products));
		}
		//if(!empty($_GET['cut_div_val'])){
			//print_r($_GET['cut_div_val']); die;
			
			
		//}

	}	
	 public function productDetail($id){
		$product_details = DB::table('diamond_feeds__')->where('id', $id)->first();
        return view('frontend.pages.products_details', compact('product_details' ,$product_details));
    }

   



}
