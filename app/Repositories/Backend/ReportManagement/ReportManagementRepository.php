<?php

namespace App\Repositories\Backend\ReportManagement;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\OrderManagement\Order;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\DiamondTemplates\DiamondTemplate;
use App\Models\Access\User\User;
use App\Models\Currency;

/**
 * Class OrderRepository.
 */
class ReportManagementRepository extends BaseRepository
{


    public function get_currency(){
        $client = new \GuzzleHttp\Client();     
        // Create a request
        $res = $client->get('https://api.exchangeratesapi.io/latest?base=USD');
        // Get the actual response without headers
        $response =  $res->getBody();
          $aa= (array) json_decode($response);
          return $aa;
      }
    
    public function diamondDetails(){
        $totaldiamonds = DB::table('diamond_feeds')
                 ->select('supplier_name', DB::raw('count(*) as total'))
                 ->groupBy('supplier_name')
                 ->where('active', 1)
                 ->paginate(10);
                 //->get();
       return $totaldiamonds;              
    }
    //=========================

    public function diamondDetailsSupplierWise($supplier_name = ''){

        $totaldiamonds = DB::table('diamond_feeds')
                 ->where('active', 1)
                 ->where('supplier_name', $supplier_name)
                 ->paginate(10);
                 //->get();
       return $totaldiamonds; 

    }

    public function diamondDetailsSupplierWisePDF($supplier_name = ''){

        $totaldiamonds = DB::table('diamond_feeds')
                 ->where('active', 1)
                 ->where('supplier_name', $supplier_name)
                 ->take(10)
                 ->get();
       return $totaldiamonds; 

    }

    public function countTotalDiamonds($supplier_name = ''){

        $totaldiamonds = DB::table('diamond_feeds')
                 ->where('active', 1)
                 ->where('supplier_name', $supplier_name)
                 ->count();
       return $totaldiamonds; 

    }

    //=========================
}
