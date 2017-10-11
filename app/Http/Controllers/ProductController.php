<?php

namespace App\Http\Controllers;

use App\Product;
use App\Menu;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editProductRequest;
use Toastr;

class ProductController extends Controller
{
	public function listProduct()
    {
        $product=Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.list-all-products')->with(['product'=>$product]);
    }

    public function getaddProduct ()
    {
        $category = Category::all();
        return view('admin.product.add-product')->with(['category'=>$category]);
    }

    public function postaddProduct (Request $rq,addProductRequest $request)
    {
        $addProduct=new Product;
        $addProduct->name=$rq->input('product-name');
        $addProduct->category_id=$rq->input('product-cate');
        $addProduct->description=$rq->input('description');
        $addProduct->quantity=$rq->input('quantity');
        $addProduct->unit_price=$rq->input('unitprice');
        $addProduct->promotion_price=$rq->input('promotion-price');
        $addProduct->image=$rq->input('product-image');
        $addProduct->new=$rq->input('version');
        $addProduct->hot=$rq->input('status');
        $addProduct->deals=$rq->input('deals');
        $addProduct->unit=$rq->input('unit');
        $addProduct->save();
        Toastr::success('Add successful product', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }

    public function geteditProduct ($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit-product')->with(['product'=>$product,'category'=>$category]);
    }

    public function posteditProduct ($id ,Request $rq, editProductRequest $request )
    {
        $editProduct=Product::find($id);
        $name=$rq->input('product-name');
            if($name!= null) $editProduct->name=$name;
        $editProduct->category_id=$rq->input('product-cate');
        $description=$rq->input('description');
            if($description!=null) $editProduct->description=$description;
        $quantity=$rq->input('quantity');
            if($quantity!=null) $editProduct->quantity=$quantity;
        $unit_price=$rq->input('unitprice');
            if($unit_price=!null) $editProduct->unit_price=$unit_price;
        $promotion_price=$rq->input('promotion-price');
            if($promotion_price!=null) $editProduct->promotion_price=$promotion_price;
        $image=$rq->input('product-image');
            if($image=!null) $editProduct->image=$image;
        $editProduct->new=$rq->input('version');
        $editProduct->hot=$rq->input('status');
        $editProduct->deals=$rq->input('deals');
        $unit=$rq->input('unit');
            if($unit=!null) $editProduct->unit=$unit;
        $editProduct->save();
        Toastr::success('Edit successful product', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }

    public function deleteProduct ($id)
    {
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Toastr::success('Delete successful product', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }

}
