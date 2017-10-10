<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function categories()
    {
        return $this->hasMany('App\Category','menu_id','id');
    }
    public function product()
    {
        return $this->hasManyThrough('App\Product','App\Category','menu_id', 'category_id','id');
    }
}
