<?php

namespace App\Models\DiamondTemplates;

use App\Models\DiamondTemplates\Traits\DiamondTemplateAttribute;
use App\Models\DiamondTemplates\Traits\DiamondTemplateRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class DiamondTemplate extends Model
{
    use ModelTrait,
    DiamondTemplateAttribute,
    DiamondTemplateRelationship {
        // DiamondTemplateAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'diamond_templates';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'title',
        'multiplier_gbp',
        'multiplier_usd',
        'vat_from_gbp',
        'vat_to_gbp',
        'vat_from_usd',
        'vat_to_usd',
        'is_term_accept'
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
        'updated_at',
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
