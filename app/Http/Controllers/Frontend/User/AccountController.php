<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Currency;
use App\Models\Access\User\User;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    public function currencyUpdate(Request $request){
        $auth_id = Auth::user()->id;
        $user = User::find($auth_id);
        $symbol = Currency::where('code', $request->currency_code)->first();
        //print_r($symbol->symbol); die;

        $user->currency_code = $request->currency_code; 
        $user->currency_symbol = $symbol->symbol; 
        $user->save(); 
        return back();
          }


}
