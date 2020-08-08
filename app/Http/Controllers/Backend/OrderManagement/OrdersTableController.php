<?php

namespace App\Http\Controllers\Backend\OrderManagement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\OrderManagement\OrderRepository;
use App\Http\Requests\Backend\OrderManagement\ManageOrderRequest;

/**
 * Class OrdersTableController.
 */
class OrdersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var OrderRepository
     */
    protected $order;

    /**
     * contructor to initialize repository object
     * @param OrderRepository $order;
     */
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    public function getjsondata()
    {    $orderStatus = 3;
        $orders=$this->order->order($orderStatus);
        return response()->json(['order'=>$orders]);
    }

    /**
     * This method return the data of the model
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOrderRequest $request)
    {    $orders = 3;
        return Datatables::of($this->getjsondata())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($order) {
                return Carbon::parse($order->created_at)->toDateString();
            })
            ->addColumn('actions', function ($order) {
                return $order->action_buttons;
            })
            ->make(true);
    }
}
