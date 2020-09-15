<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Pagination\Paginator;
use App\Models\Contacts\Contact;
use App\Models\Subscribmails\Subscribmail;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendContact;
use App\Mail\SendSubscribe;
use App;

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


    public function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
       
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
        }
        $i = count($matches['browser']);
        if ($i != 1) {
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }
        if ($version==null || $version=="") {$version="?";}
       
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }


    public function contactUsend(Request $request){
        //print_r($request->all()); die;
        if(empty($request->name) || empty($request->email) || empty($request->contact_no) || empty($request->subject)){
        toastr()->warning('Please Fill Up the Name, Email, Contact No. & Subject In Proper Way');
        return redirect('contact-us');
        }
        
        $ua=$this->getBrowser();
        $dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
		$contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact_no = $request->contact_no;
        $contact->ip_address = $_SERVER['REMOTE_ADDR'];
        $contact->user_agent = $ua['userAgent'];
        $contact->browser = $ua['name']; //.' '.$ua['version'];
        $contact->plateform = $ua['platform'];
        $contact->subject = $request->subject;
        $contact->message = $request->message;	
        $contact->datetime = $dateTime->format("d/m/Y  h:i A");		   
		if($contact->save()){
			toastr()->success('Thank You, I will contact with you very soon');
		}else{
			toastr()->warning('Not Sent');
		}
		//---------start-mail-section-------------
		if($request->email !== ''){	
            $contact = [
				'name'=> $request->name,
				'email'=> $request->email, 
				'subject' => $request->subject,
				'message' => $request->message,
				'datetime'=> $dateTime->format("d/m/Y  h:i A")
            ];
            $mail = \Mail::to(env('MAIL_GETTO'))->send(new SendContact($contact));
			   }	
	   //---------End-mail-section-------------	

        return redirect('contact-us');
    }


    public function SubscriberMail(Request $request){
        //print_r($request->all()); die;
        if(empty($request->mcemail)){
        toastr()->warning('Please Enter Your Email Address');
        return back();
        }
        $ua=$this->getBrowser();
        $dateTime = new DateTime('now', new DateTimeZone('Europe/London'));
		$subscriber = new Subscribmail();
        $subscriber->email = $request->mcemail;
        $subscriber->ip_address = $_SERVER['REMOTE_ADDR'];
        $subscriber->user_agent = $ua['userAgent'];
        $subscriber->browser = $ua['name']; //.' '.$ua['version'];
        $subscriber->plateform = $ua['platform'];
        $subscriber->datetime = $dateTime->format("d/m/Y  h:i A");		   
		if($subscriber->save()){
			toastr()->success('Thank You For Subscribe, I will contact with you very soon');
		}else{
			toastr()->warning('Not Sent');
		}
		//---------start-mail-section-------------
		if($request->mcemail !== ''){	
            $subscribedata = [
				'email'=> $request->mcemail, 
				'datetime'=> $dateTime->format("d/m/Y  h:i A")
            ];
            $mail = \Mail::to(env('MAIL_GETTO'))->send(new SendSubscribe($subscribedata));

			   }	
	   //---------End-mail-section-------------	

        return back();
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
