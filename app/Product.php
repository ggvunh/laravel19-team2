<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public function Category()
        {
        	return $this->belongsTo('App\Category','category_id','id');
        }

    public function bill_detail()
        {
        	return $this->hasMany('App\BillDetail','product_id','id');
        }

    public function Brand()
        {
        	return $this->belongsTo('App\Brand','brand_id','id');
        }
    
    public function Bill()
        {
            return $this->belongstoMany('App\Bill');
        }

}
