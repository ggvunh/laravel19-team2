<?php

namespace App\Http\Controllers;

use App\Product;
use App\Menu;
use App\Brand;
use App\Category;
use Toastr;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editProductRequest;

class ProductController extends Controller
{
    public function listProduct ()
    {
        $product = Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.list-all-products')->with(['product'=>$product]);
    }

    public function getaddProduct ()
    {
        $category = Category::all();
        $brand    =Brand::all();
        return view('admin.product.add-product')->with(['category'=>$category,'brand'=>$brand]);
    }

    public function postaddProduct (Request $rq,addProductRequest $request )
    {
        $addProduct = new Product;
        $addProduct->name = $rq->input('product-name');
        $addProduct->category_id = $rq->input('product-cate');
        $addProduct->brand_id = $rq->input('product-brand');
        $addProduct->description = $rq->input('description');
        $addProduct->quantity = $rq->input('quantity');
        $addProduct->unit_price = $rq->input('unitprice');
        $addProduct->promotion_price = $rq->input('promotion-price');
        $addProduct->new = $rq->input('version');
        $addProduct->hot = $rq->input('status');
        $addProduct->deals = $rq->input('deals');
        $addProduct->unit = $rq->input('unit');
        if ($rq->hasFile('product-image') )
        {
            $file = $rq->file('product-image');
            $filename = $file->getClientOriginalName(); 
            $images = time(). "_" . $filename;
            $destinationPath = public_path('images/products');
            $file->move($destinationPath, $images);
            $addProduct->image = $images;
        } 
        $addProduct->save();
        Toastr::success('Add successful product', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }

    public function geteditProduct ($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $brand    =Brand::all();
        return view('admin.product.edit-product')->with(['product'=>$product,'category'=>$category,'brand'=>$brand]);
    }

    public function posteditProduct ($id ,Request $rq, editProductRequest $request )
    {
        $editProduct = Product::find($id);
        $editProduct->name = $rq->input('product-name');
        $editProduct->category_id = $rq->input('product-cate');
        $editProduct->brand_id = $rq->input('product-brand');
        $editProduct->description = $rq->input('description');
        $editProduct->quantity = $rq->input('quantity');
        $editProduct->unit_price = $rq->input('unitprice');
        $editProduct->promotion_price = $rq->input('promotion-price');
        if ($rq->hasFile('product-image') )
        {
            $file = $rq->file('product-image');
            $filename = $file->getClientOriginalName(); 
            $images = time(). "_" . $filename;
            $destinationPath = public_path('images/products');
            $file->move($destinationPath, $images);
            $oldfile = $editProduct->image;
            Storage::delete($oldfile);
            $editProduct->image = $images;
        }        
        $editProduct->new = $rq->input('version');
        $editProduct->hot = $rq->input('status');
        $editProduct->deals = $rq->input('deals');
        $editProduct->unit = $rq->input('unit');
        $editProduct->save();
        Toastr::success('Edit successful product', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }

    public function deleteProduct ($id)
    {
        $deleteProduct = Product::find($id);
        $oldfile = $deleteProduct->image;
        Storage::delete($oldfile);
        $deleteProduct->delete();
        Toastr::success('Delete successful product', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }

    public function searchProduct(Request $rq)
    {   
        if($rq->input('search') != null)
        {
            $products = Product::where('name','like','%'.$rq->input('search').'%')
                ->orwhere('unit_price',$rq->input('search'))
                ->orwhere('promotion_price',$rq->input('search'))->get();       
        }
        else {
            $products = [];
        }
        return view('admin.product.search')->with(['products'=>$products]);
    }

}
