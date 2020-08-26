<?php

namespace App\Http\Controllers\Backend\ReportManagement;

use App\Models\OrderManagement\Order;
use App\Models\Settings\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Repositories\Backend\ReportManagement\ReportManagementRepository;
use App\Models\Sessions\Sessions;
use Auth;
use DB;

use PDF;
use App;
use Carbon\Carbon;

/**
 * OrdersController
 */
class ReportManagementController extends Controller
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
    public function __construct(ReportManagementRepository $repository)
    {
        $this->repository = $repository;
    }

    // now try it

    public function index(Request $request)
    {   
        //$totaldiamonds = $this->repository->diamondDetails();
        //echo '<pre>'; print_r($totaldiamonds); die;
        return new ViewResponse('backend.reportmanagement.index',[
               'totaldiamonds'=>$this->repository->diamondDetails(),
             ]);
    }

    public function dataSupplierWise(Request $request, $supplier_name){

        $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
                $price_arr = $this->repository->get_currency();
                $rate = (array) $price_arr['rates'];
                $baserate = (array) $price_arr['base'];
                $current_currency = $rate[$currency->code];
                $symbol = $currency->symbol;

        return new ViewResponse('backend.reportmanagement.supplier_diamonds',[
            'symbol' => $symbol, 
            'current_currency' => $current_currency,
            'supplier_name' => $supplier_name,
            'totaldiamonds'=>$this->repository->diamondDetailsSupplierWise($supplier_name),
            'countTotalDiamonds' =>$this->repository->countTotalDiamonds($supplier_name),
          ]);   
    }

    //===============================
   public function PdfDownload(Request $request, $supplier_name){

    // $pdf = PDF::loadView('backend.reportmanagement.supplier_diamonds',[
    //     'supplier_name' => $supplier_name,
    //     'totaldiamonds'=>$this->repository->diamondDetailsSupplierWisePDF($supplier_name),
    //   ]);
      
     // return $pdf->stream();
     
   }
   

    //==================================



   

    
}
