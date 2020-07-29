<?php

namespace App\Http\Controllers\Backend\DiamondTemplates;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\DiamondTemplates\DiamondTemplateRepository;
use App\Http\Requests\Backend\DiamondTemplates\ManageDiamondTemplateRequest;

/**
 * Class DiamondTemplatesTableController.
 */
class DiamondTemplatesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DiamondTemplateRepository
     */
    protected $diamondtemplate;

    /**
     * contructor to initialize repository object
     * @param DiamondTemplateRepository $diamondtemplate;
     */
    public function __construct(DiamondTemplateRepository $diamondtemplate)
    {
        $this->diamondtemplate = $diamondtemplate;
    }

    /**
     * This method return the data of the model
     * @param ManageDiamondTemplateRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDiamondTemplateRequest $request)
    {
        return Datatables::of($this->diamondtemplate->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('is_term_accept', function ($page) {
                return $page->status_label;
            })
            ->addColumn('created_at', function ($diamondtemplate) {
                return Carbon::parse($diamondtemplate->created_at)->toDateString();
            })
            ->addColumn('actions', function ($diamondtemplate) {
                return $diamondtemplate->action_buttons;
            })
            ->make(true);
    }
}
