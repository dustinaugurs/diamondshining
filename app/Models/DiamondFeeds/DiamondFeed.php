<?php

namespace App\Models\DiamondFeeds;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\DiamondFeeds\Traits\DiamondFeedAttribute;
use App\Models\DiamondFeeds\Traits\DiamondFeedRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class DiamondFeed extends BaseModel
{   use Sortable;
    use ModelTrait,
        SoftDeletes,
        DiamondFeedAttribute,
    	DiamondFeedRelationship {
            // DiamondFeedAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'diamond_feeds';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'stock_id', 'ReportNo', 'shape', 'carats', 'col', 'clar', 'cut', 'pol', 'symm', 'flo', 'floCol', 'lwratio', 'length', 'width', 'height', 'depth', 'table', 'culet', 'lab', 'girdle', 'eyeclean', 'brown', 'green', 'milky', 'actual_supplier', 'discount', 'price', 'price_per_carat', 'video', 'video_frames', 'image', 'pdf', 'mine_of_origin', 'canada_mark_eligble','supplier_name','location','is_returnable','supplier_id', 'active', 'video_url', 'img_url', 'pdf_url', 'uniqueId', 'created_by', 'updated_by'
    ];

    public $sortable = [
        'stock_id', 'ReportNo', 'shape', 'carats', 'col', 'clar', 'cut', 'pol', 'symm', 'flo', 'floCol', 'lwratio', 'length', 'width', 'height', 'depth', 'table', 'culet', 'lab', 'girdle', 'eyeclean', 'brown', 'green', 'milky', 'actual_supplier', 'discount', 'price', 'price_per_carat', 'video', 'video_frames', 'image', 'pdf', 'mine_of_origin', 'canada_mark_eligble','supplier_name','location','is_returnable','supplier_id', 'active', 'video_url', 'img_url', 'pdf_url', 'uniqueId', 'created_by', 'updated_by'
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

    public static function insertData($data){
        $countData =DB::table('diamond_feeds')->where('stock_id', $data['stock_id'])->count();
        $value=DB::table('diamond_feeds')->where('stock_id', $data['stock_id'])->first();
        if($countData == 0){
           DB::table('diamond_feeds')->insert($data);
        }else{
            DB::table('diamond_feeds')->where('stock_id', $data['stock_id'])->update($data);                
        }

    }
}
