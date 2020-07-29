<?php

namespace App\Http\Controllers\Backend\DiamondFeeds;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DiamondFeeds\ManageDiamondFeedRequest;
use App\Repositories\Backend\DiamondFeeds\DiamondFeedRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

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
            ->addColumn('created_at', function ($diamondfeed) {
                return Carbon::parse($diamondfeed->created_at)->toDateString();
            })
            ->addColumn('actions', function ($diamondfeed) {
                return $diamondfeed->action_buttons;
            })
            ->make(true);
    }
}
