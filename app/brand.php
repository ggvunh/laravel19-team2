<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';

    public function product()
    {
        return $this->hasMany('App\Product','brand_id','id');
    }
}
