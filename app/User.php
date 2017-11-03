<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'address', 'phone_number', 'gender'];

    public function bill()
        {
        	return $this->hasMany('App\Bill','user_id','id');
        }

    public function bill_detail()
        {
            return $this->hasManyThrough('App\BillDetail', 'App\Bill', 'user_id', 'bill_id', 'id' );
        }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
