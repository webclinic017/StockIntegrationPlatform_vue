<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basic_info extends Model
{
    protected $table ='basic_infos';
    
    protected $fillable = [
        'stock_id',
        'company',
        'industry',
        'start_time',
        'IPO',
        'Chairman',
        'capital',
        'publiccommon_stock',
        'common_stock',
        'preferred_stock',
        'investman',
        'Main_business'
    ];
}
