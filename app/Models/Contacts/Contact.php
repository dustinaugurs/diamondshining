<?php

namespace App\Models\Contacts;

use App\Models\ModelTrait;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Contact extends BaseModel
{   
    
    protected $table = 'contacts';
  
    protected $fillable = [
        'name', 'email', 'contact_no', 'subject', 'message', 'datetime', 'ip_address', 'user_agent', 'browser', 'plateform'
    ];

}
