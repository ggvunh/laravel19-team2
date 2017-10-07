<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function categories()
    {
        return $this->hasMany('App\Category','menu_id','id');
    }
}
