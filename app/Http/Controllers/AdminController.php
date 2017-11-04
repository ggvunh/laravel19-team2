<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Bill;
use App\Brand;

class AdminController extends Controller
{
    public function getAdmin()
    {
        $user = count(User::all());
        $product = count(Product::all());
        $order = count(Bill::all());
        $ordered = count(Bill::where('status','1')->get());
        $brand = count(Brand::all());
        return view('admin.admin-home', compact('user','product','order','ordered','brand'));
    }

    public function pusher()
    {
        $options = array(
        'cluster' => 'ap1',
        'encrypted' => true
        );
        $pusher = new \Pusher\Pusher(
        'd39395df272cbcb9870d',
        '6e5d669eed3c8e943940',
        '421424',
        $options
        );

        $data['message'] = 'Guitarshop checkout';
        $pusher->trigger('GuitarShop', 'chekout', $data);
    }

    public function searchGeneral(request $req)
    {
        $searchs = Bill::Where('id', $req ->input('q'))->get();
        return view('admin.general.search', compact('searchs'));
    }
}
