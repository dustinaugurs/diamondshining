<?php

namespace App\Http\Controllers\Backend\Diamond;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Diamond\DiamondRepository;
use App\Http\Requests\Backend\Diamond\ManageDiamondRequest;

/**
 * Class DiamondsTableController.
 */
class DiamondsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DiamondRepository
     */
    protected $diamond;

    /**
     * contructor to initialize repository object
     * @param DiamondRepository $diamond;
     */
    public function __construct(DiamondRepository $diamond)
    {
        $this->diamond = $diamond;
    }

    /**
     * This method return the data of the model
     * @param ManageDiamondRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDiamondRequest $request)
    {
        return Datatables::of($this->diamond->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($diamond) {
                return Carbon::parse($diamond->created_at)->toDateString();
            })
            ->addColumn('actions', function ($diamond) {
                return $diamond->action_buttons;
            })
            ->make(true);
    }
}
