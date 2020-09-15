<?php

namespace App\Models\Subscribmails;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Subscribmail extends BaseModel
{   
    
    protected $table = 'subscribmails';
  
    protected $fillable = [
        'email', 'datetime', 'ip_address', 'user_agent', 'browser', 'plateform'
    ];

}
