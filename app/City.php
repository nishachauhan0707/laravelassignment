<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
     protected $fillable = [
        'id','state_id', 'state_code', 'city_name'
    ];
}
