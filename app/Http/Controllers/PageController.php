<?php

namespace App\Http\Controllers;

use App\Product;
use App\Menu;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editProductRequest;
class PageController extends Controller
{
    public function getIndex()
    {
        $menus=Menu::all();
        $hot_products = product::where('hot', 1)->get();
        $new_products = product::where('new', 1)->get();
        $deal_products = product::where('deals', 1)->get();
        $products = product::all();
        return view('page.trangchu', compact('hot_products', 'new_products', 'deal_products', 'products'));
    }
    public function getSanPham()
    {
        $products = product::all();
        return view('page.sanpham', compact('products'));

    }
    public function getChiTiet()
    {
      return view('page.chitietsp');

    }
    public function getGioHang()
    {
      return view('page.giohang');

    }
    public function login()
    {
      return 12345;
    }
    // function Add Product-Category by Duong Dong Hung
    public function listProduct()
    {
        $data=Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.list-all-products')->with(['data'=>$data]);
    }
    public function getaddCategory()
    {
        return view('admin.product.add-categoryProduct');
    }

    public function postaddCategory(Request $rq,addCategoryRequest $request)
    {
          $addCategory=new Category;
          $addCategory->name=$rq->input('cateproduct-name');
          $addCategory->save();
          return redirect('admin/product/addcategory')->with('infor','Thêm sản phẩm thành công');
    }

    public function getaddProduct()
    { 
          $category=Category::all();
          return view('admin.product.add-product')->with(['category'=>$category]);
    }

    public function postaddProduct(Request $rq,addProductRequest $request)
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
          return redirect('admin/product/listproduct')->with('infor','Thêm sản phẩm thành công');
           
    }

    public function geteditProduct($id)
    {
          $product=Product::find($id);
          $category=Category::all();
          return view('admin.product.edit-product')->with(['product'=>$product,'category'=>$category]);
    }

    public function posteditProduct($id ,Request $rq, editProductRequest $request )
    {
          $editProduct=Product::find($id);
          $editProduct->name=$rq->input('product-name');
          $editProduct->category_id=$rq->input('product-cate');
          $editProduct->description=$rq->input('description');
          $editProduct->quantity=$rq->input('quantity');
          $editProduct->unit_price=$rq->input('unitprice'); 
          $editProduct->promotion_price=$rq->input('promotion-price');
          $editProduct->image=$rq->input('product-image');
          $editProduct->new=$rq->input('version');
          $editProduct->hot=$rq->input('status');
          $editProduct->deals=$rq->input('deals');
          $editProduct->unit=$rq->input('unit');
          $editProduct->save();
          return redirect('admin/product/editproduct/'.$id)->with('infor','Sửa sản phẩm thành công');
    }

    public function deleteProduct($id)
    {
          $deleteProduct=Product::find($id);
          $deleteProduct->delete();
          return redirect('admin/product/listproduct')->with('infor','Xóa sản phẩm thành công');
    }
} 


