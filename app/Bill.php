<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    public function bill_detail()
        {
            return $this->hasMany('App\BillDetail','category_id','id');
        }
    public function user()
        {
            return $this->belongsTo('App\User','user_id','id');
        }
}
