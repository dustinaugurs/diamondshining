<?php

namespace App\Repositories\Backend\Diamond;

use DB;
use Carbon\Carbon;
use App\Models\Diamond\Diamond;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DiamondRepository.
 */
class DiamondRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Diamond::class;

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
                config('module.diamonds.table').'.id',
                config('module.diamonds.table').'.created_at',
                config('module.diamonds.table').'.updated_at',
            ]);
    }

}
