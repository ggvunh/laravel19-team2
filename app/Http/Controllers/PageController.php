<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Product;
use App\User;
use App\Category;
use App\Bill;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editProductRequest;
use App\Http\Requests\SearchIsPrice;
use Illuminate\Support\Facades\Input;
class PageController extends Controller
{
    public function getIndex()
    {
        $hot_products = Product::where('hot', 1)->get();
        $new_products = Product::where('new', 1)->get();
        $deal_products = Product::where('deals', 1)->get();
        return view('page.trangchu', compact('hot_products', 'new_products', 'deal_products'));
    }

    public function getSanPham()
    {
        $products = Product::orderBy('id','desc')->paginate(6);
        return view('page.sanpham', compact('products'));
    }

    public function viewis_category($category_id)
    {
        $products = Product::where('category_id',$category_id)->paginate(6);
        return view('page.sanpham', compact('products'));
    }

    public function searchsp(Request $req)
    {
        $key=$req->key;
        $products = Product::where('name','like','%'.$req->key.'%')
            ->orwhere('unit_price',$req->key)
            ->orwhere('promotion_price',$req->key)
            ->paginate(6);
        return view('page.searchsp', compact('products','key'));
    }

    public function search_is_price(Request $req, SearchIsPrice $request)
    {
        $total_search = count(Product::where([ ['promotion_price','>',$req->min],['promotion_price','<',$req->max] ])
            ->orwhere([ ['unit_price','>',$req->min],['unit_price','<',$req->max] ])->get());

        $products = Product::where([ ['promotion_price','>',$req->min],['promotion_price','<',$req->max] ])
            ->orwhere([ ['unit_price','>',$req->min],['unit_price','<',$req->max] ])->paginate(6);
        return view('page.searchsp', compact('products', 'total_search'));
    }

    public function xem_chitiet($id,$category_id)
    {
        $product=Product::where('id',$id)->get();
        $products=Product::where('category_id',$category_id)->paginate(3);
        return view('page.view_chitiet', compact('product'), compact('products'));
    }

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

    public function gioithieu()
    {
        return view('page.gioithieu');
    }
}
