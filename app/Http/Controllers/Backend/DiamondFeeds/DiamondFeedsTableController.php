<?php

namespace App\Http\Controllers\Backend\DiamondFeeds;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DiamondFeeds\ManageDiamondFeedRequest;
use App\Repositories\Backend\DiamondFeeds\DiamondFeedRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Auth;

/**
 * Class DiamondFeedsTableController.
 */
class DiamondFeedsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DiamondFeedRepository
     */
    protected $diamondfeeds;

    /**
     * contructor to initialize repository object
     * @param DiamondFeedRepository $diamondfeed;
     */
    public function __construct(DiamondFeedRepository $diamondfeeds)
    {
        $this->diamondfeed = $diamondfeeds;
    }

    /**
     * This method return the data of the model
     * @param ManageDiamondFeedRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDiamondFeedRequest $request)
    {   
        
        return Datatables::of($this->diamondfeed->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('stock_id', function ($diamondfeed) {
                return $diamondfeed->stock_id;
            })
            ->addColumn('currencyPrice', function ($diamondfeed) {
                $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
                $price_arr = $this->diamondfeed->get_currency();
                $rate = (array) $price_arr['rates'];
                $baserate = (array) $price_arr['base'];
                $current_currency = $rate[$currency->code];
                $symbol = $currency->symbol;

                return $symbol.' '.number_format(floor(($diamondfeed->price*$current_currency)*100)/100,2, '.', '');
            })
            ->addColumn('created_at', function ($diamondfeed) {
                return Carbon::parse($diamondfeed->created_at)->toDateString();
            })
            ->addColumn('actions', function ($diamondfeed) {
                return $diamondfeed->action_buttons;
            })
            ->make(true);
    }
}
