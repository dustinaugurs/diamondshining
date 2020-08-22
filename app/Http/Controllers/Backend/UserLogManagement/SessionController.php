<?php

namespace App\Http\Controllers\Backend\UserLogManagement;

use App\Models\OrderManagement\Order;
use App\Models\Settings\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Repositories\Backend\UserLogManagement\SessionRepository;
use App\Models\Sessions\Sessions;
use Auth;
use DB;

/**
 * OrdersController
 */
class SessionController extends Controller
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
    public function __construct(SessionRepository $repository)
    {
        $this->repository = $repository;
    }

    // now try it

    public function index(Request $request)
    { 
        $customersfilter=$this->repository->customerFilters();
        //echo 'Deepak'; die;
        //$customers = $this->repository->customerDetails();
        //echo '<pre>'; print_r($customersfilter->toArray()); die;
        return new ViewResponse('backend.userlogmanagement.index',[
               'customers'=>$this->repository->customerDetails(),
               'customersfilter'=>$this->repository->customerFilters(),
               'customersbrowser'=>$this->repository->customerBrowsers(),
               'customersplateform'=>$this->repository->customerPlateforms(),
             ]);
    }

    //===============================

    public function userLogFilter(Request $request){
        //echo 'dkp'; die;
        $month_year = $request->month_year;
        $customer_id = $request->customer_id;
        $browser_name = $request->browser_name;  
        $plateform_name = $request->plateform_name;
       
        $query = DB::table('sessions')
                 ->join('users', 'sessions.user_id', '=', 'users.id')
                //->join('role_user', 'users.id', '=', 'role_user.user_id')
                //->whereIn('role_user.role_id', [3])
                //->where('user_id', $customer_id)
                ->orderBy('sessions.id', 'desc');
                //->paginate(10);

         //echo '<pre>'; print_r($query->toArray()); die;       
        
        if($month_year !== "all"){
            $query->where('month_year', $month_year);
        } 
    
        if($customer_id !== "all"){
             $query->where('user_id', $customer_id);
         }else{
            $query->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->whereIn('role_user.role_id', [3]);
         }

         if($browser_name !== "all"){
            $query->where('browser', $browser_name);
        }

        if($plateform_name !== "all"){
            $query->where('plateform', $plateform_name);
        }
        
    
        $customers = $query->paginate(10);
                        
             //print_r($orders); die;
            return view('backend.userlogmanagement.customer_component', [
                'customers' => $customers,
                ]);
    
        } 

  //=====================================
  
  public function userLogDelete(Request $request){
    $session = DB::delete('delete from sessions where user_session_id = ?',[$request->detid]);

     //print_r($session);
     //die;
//     if($session){
//     toastr()->success('User Log Details Deleted Successfully ');
//    }else{
//     toastr()->warning('User Log Details Not Deleted ');   
//    }
   
   

   return view('backend.userlogmanagement.customer_component', [
    'customers'=>$this->repository->customerDetails(),
    ]);

  }

  //=================================
  public function userLogDetails(Request $request, $id = ''){
      $id = $request->id;
     // print_r($id); die;
    $customers = DB::table('sessions')
            ->join('users', 'sessions.user_id', '=', 'users.id')
            //->join('role_user', 'users.id', '=', 'role_user.user_id')
            //->whereIn('role_user.role_id', [3])
            ->where('sessions.user_session_id', $id)
            ->first();

    return view('backend.userlogmanagement.customer_details', [
                'customers'=> $customers,
                ]);       
  }

    //==================================



   

    
}
