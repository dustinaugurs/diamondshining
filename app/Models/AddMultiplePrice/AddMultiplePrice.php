<?php

namespace App\Models\AddMultiplePrice;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class AddMultiplePrice extends BaseModel
{   use Sortable;
    
    protected $table = 'add_multiple_price';

    protected $fillable = [
        'temp_id', 'vat_from_usd', 'vat_to_usd', 'multiplier_usd'
    ];

    public $sortable = [
        'temp_id', 'vat_from_usd', 'vat_to_usd', 'multiplier_usd'
    ];


}
