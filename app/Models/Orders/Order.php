<?php

namespace App\Models\Orders;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Order extends BaseModel
{   use Sortable;
    
    protected $table = 'orders';
  
    protected $fillable = [
        'user_id', 'userEmail', 'diamondFeed_id', 'order_status', 'orderTrackingId', 'checkStatus', 'payment_status',  'status_from_admin', 'deliverycost_from_admin', 'multiplier_id', 'ref_name_contact', 'client', 'ETA', 'order_date', 'date'
    ];

    public $sortable = [
        'user_id', 'userEmail', 'diamondFeed_id', 'order_status', 'orderTrackingId', 'checkStatus', 'payment_status',  'status_from_admin', 'deliverycost_from_admin', 'multiplier_id', 'ref_name_contact', 'client', 'ETA', 'order_date', 'date'
    ];

    public function multiplierprice()
	{
		return $this->belongsTo('App\Models\AddMultiplePrice\AddMultiplePrice', 'multiplier_id', 'id');
	}


    public function diamondfeed()
	{
		return $this->belongsTo('App\Models\DiamondFeeds\DiamondFeed', 'diamondFeed_id', 'id');
	}

    public function user()
	{
		return $this->belongsTo('App\Models\Access\User\User');
	}

    


}
