<?php

namespace App\Repositories\Backend\DiamondTemplates;

use DB;
use Carbon\Carbon;
use App\Models\DiamondTemplates\DiamondTemplate;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DiamondTemplateRepository.
 */
class DiamondTemplateRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = DiamondTemplate::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.diamond_templates.table').'.id',
                config('module.diamond_templates.table').'.title',
                config('module.diamond_templates.table').'.vat_from_gbp',
                config('module.diamond_templates.table').'.vat_to_gbp',
                config('module.diamond_templates.table').'.vat_from_usd',
                config('module.diamond_templates.table').'.vat_to_usd',
                config('module.diamond_templates.table').'.multiplier_gbp',
                config('module.diamond_templates.table').'.multiplier_usd',
                config('module.diamond_templates.table').'.is_term_accept',
                config('module.diamond_templates.table').'.created_at',
                config('module.diamond_templates.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        // dd($input);
        if (DiamondTemplate::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.diamondtemplates.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param DiamondTemplate $diamondtemplate
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(DiamondTemplate $diamondtemplate, array $input)
    {
		//print_r('cdvg'); die;
    	if ($diamondtemplate->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.diamondtemplates.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param DiamondTemplate $diamondtemplate
     * @throws GeneralException
     * @return bool
     */
    public function delete(DiamondTemplate $diamondtemplate)
    {
        if ($diamondtemplate->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.diamondtemplates.delete_error'));
    }

     /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'title', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }
}
