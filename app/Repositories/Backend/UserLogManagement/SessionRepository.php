<?php

namespace App\Repositories\Backend\UserLogManagement;

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
class SessionRepository extends BaseRepository
{
    
    public function customerDetails(){
        $customers = DB::table('sessions')
                    ->join('users', 'sessions.user_id', '=', 'users.id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->whereIn('role_user.role_id', [3])
                    //->select('*', 'sessions.id')
                    ->orderBy('sessions.id', 'desc')
                    ->paginate(10);
                    //->get();
       return $customers;              
    }

    public function customerBrowsers(){
        $browsers = DB::table('sessions')
                    ->join('users', 'sessions.user_id', '=', 'users.id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->whereIn('role_user.role_id', [3])
                    ->groupBy('sessions.browser')
                    ->get();
       return $browsers;              
    }

    public function customerPlateforms(){
        $plateforms = DB::table('sessions')
                    ->join('users', 'sessions.user_id', '=', 'users.id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->whereIn('role_user.role_id', [3])
                    ->groupBy('sessions.plateform')
                    ->get();
       return $plateforms;              
    }

    public function customerFilters(){
        $customers = DB::table('users')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->whereIn('role_user.role_id', [3])
                    ->get();
       return $customers;              
    }
    //=========================
}
