<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editProductRequest;
class PageController extends Controller
{
    public function getIndex()
    {
        $hot_products = Product::where('hot', 1)->get();
        $new_products = Product::where('new', 1)->get();
        $deal_products = Product::where('deals', 1)->get();
        $products = Product::all();
        return view('page.trangchu', compact('hot_products', 'new_products', 'deal_products', 'products'));
    }

    public function getSanPham()
    {
        $products = Product::orderBy('id','desc')->paginate(6);
        return view('page.sanpham', compact('products'));
    }

    public function viewsp_category($id)
    {
        $products = Product::where('category_id',$id)->paginate(6);
        return view('page.sanpham', compact('products'));
    }

    public function searchsp(Request $req)
    {
        $products = Product::where('name','like','%'.$req->key.'%')
            ->orwhere('unit_price',$req->key)
            ->orwhere('promotion_price',$req->key)->paginate(6);

        return view('page.searchsp', compact('products'));
    }

    public function view_chitiet($id)
    {
        $product=Product::where('id',$id)->get();
        return view('page.view_chitiet',compact('product'));
    }

    public function getAdmin()
    {
        return view('admin.product.admin-master');
    }

    
}
