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
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class PageController extends Controller
{
    public function getIndex()
    {
        $hot_products = Product::where([['hot', 1],['quantity', '>', 0]])->get();
        $new_products = Product::where([['new', 1],['quantity', '>', 0]])->get();
        $deal_products = Product::where([['deals', 1], ['quantity', '>', 0]])->get();
        return view('page.trangchu', compact('hot_products', 'new_products', 'deal_products'));
    }

    public function getSanPham()
    {
        $products = Product::where('quantity', '>', 0)->orderBy('id','desc')->paginate(6);
        return view('page.sanpham', compact('products'));
    }

    public function viewis_category($category_id)
    {
        $products = Product::where([['category_id',$category_id],['quantity', '>', 0]])->paginate(6);
        return view('page.sanpham', compact('products'));
    }

    public function searchsp(Request $req)
    {
        $key=$req->key;
        $products = array();
        $product_is_name = Product::where([['name','like','%'.$req->key.'%'],['quantity', '>', 0]])->get();
        foreach ($product_is_name as $product_is_name ) {
            $products[] = $product_is_name;
        }
        $brand = Brand::where('name','like','%'.$req->key.'%')->get();
        foreach ($brand as $brand) {
            $brand_id = $brand->id;
            $product_is_brand = Product::where([['brand_id',$brand_id],['quantity', '>', 0]])->get();
            foreach ($product_is_brand as $product_is_brand) {
                $products[] = $product_is_brand;
            }
        }
        $categories = Category::where('name','like','%'.$req->key.'%')->get();
        foreach ($categories as $category) {
            $category_id = $category->id;
            $product_is_category = Product::where([['category_id',$category_id],['quantity', '>', 0]])->get();
            foreach ($product_is_category as $product_is_category) {
                $products[] = $product_is_category;
            }
        }
        $products = array_unique($products);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($products);
        $perPage = 6;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $result_search = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,['path' => LengthAwarePaginator::resolveCurrentPath()] );
        return view('page.searchsp')->with(['result_search'=>$result_search->appends(Input::except('page')),'products'=>$products,'key'=>$key]);
    }

    public function search_is_price(Request $req, SearchIsPrice $request)
    {
        $keymin = $req->keymin;
        $keymax = $req->keymax;
        $products = Product::where('quantity', '>', 0)->whereBetween('promotion_price',[$keymin,$keymax])
            ->whereBetween('unit_price',[$keymin,$keymax])->paginate(6);
        return view('page.searchisprice')->with(['products'=>$products->appends(Input::except('page')),'keymax'=>$keymax,'keymin'=>$keymin]);
    }

    public function xem_chitiet($id,$category_id)
    {
        $product=Product::where([['id',$id],['quantity', '>', 0]])->get();
        $products=Product::where([['category_id',$category_id],['quantity', '>', 0]])->paginate(3);
        return view('page.view_chitiet', compact('product'), compact('products'));
    }

    public function gioithieu()
    {
        return view('page.gioithieu');
    }
}
