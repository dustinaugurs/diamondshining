<?php

namespace App\Repositories\Backend\MeleeDiamonds;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\OrderManagement\Order;
use App\Models\MeleeDiamonds\MeleeDiamond;
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
class MeleeDiamondsRepository extends BaseRepository
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
    
    public function meleeDiamondList($shape = ''){
        $meleediamonds = MeleeDiamond::where('shape', $shape)->get(); 
        return $meleediamonds;
           }
    
    public function meleeDiamondSingleData($id = '', $shape = ''){
        $meleediamonds = MeleeDiamond::where('id', $id)->where('shape', $shape)->first(); 
        return $meleediamonds;
          }       
          
    //=========================
}
