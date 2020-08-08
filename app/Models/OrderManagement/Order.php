<?php

namespace App\Models\OrderManagement;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderManagement\Traits\OrderAttribute;
use App\Models\OrderManagement\Traits\OrderRelationship;

class Order extends Model
{
    use ModelTrait,
        OrderAttribute,
    	OrderRelationship {
            // OrderAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'orders';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'user_id', 'userEmail', 'diamondFeed_id', 'order_status', 'orderTrackingId', 'checkStatus', 'payment_status',  'status_from_admin', 'deliverycost_from_admin', 'multiplier_id', 'ref_name_contact', 'client', 'ETA', 'order_date', 'date'
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


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
