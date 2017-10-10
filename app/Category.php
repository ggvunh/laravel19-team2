<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function menu()
    {
    	return $this->belongsTo(Menu::class,'menu_id','id');
    }

    public function product()
    {
        return $this->hasMany('App\Product','category_id','id');
    }
}
