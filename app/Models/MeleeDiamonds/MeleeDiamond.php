<?php

namespace App\Models\MeleeDiamonds;

use Illuminate\Database\Eloquent\Model;

class MeleeDiamond extends Model
{
    protected $table = 'melee_diamonds';

    protected $fillable = [
        'shape', 'weight', 'size', 'EF_VS', 'GH_VS', 'EF_SI', 'GH_SI', 'EF_SI1', 'GH_SI1', 'EF_SI2', 'GH_SI2', 'IJ_SI1'
    ];

    
    

}
