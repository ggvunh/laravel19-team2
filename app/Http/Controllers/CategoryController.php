<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editCategoryRequest;
use Toastr;

class categoryController extends Controller
{
    public function listCategories()
    {
        $categories = Category::All();
        return view('admin.product.list-all-categories', compact('categories'));
    }

    public function getAddCategories()
    {
        return view('admin.product.add-categoryProduct');
    }

    public function postAddCategories(Request $rq, addCategoryRequest $request)
    {
        $data = new Category;
        $data->name=$rq->input('cateproduct-name');
        $data->save();
        Toastr::success('Add successful category', $title = null, $options = []);
        return redirect('admin/product/listcategories');
    }

    public function getEditCategories($id)
    {
        $category = Category::find($id);
        return view('admin.product.edit-category', compact('category'));
    }

    public function postEditCategories($id ,Request $rq, editCategoryRequest $request )
    {
        $data = Category::find($id);
        $name = $rq->input('category-name');
            if ($name != null) $data ->name=$name;
        $data->save();
        Toastr::success('Edit successful category', $title = null, $options = []);
        return redirect('admin/product/listcategories');
    }

    public function deleteCategories ($id)
    {
        $data = Category::find($id);
        $data ->product()->delete();
        $data->delete();
        Toastr::success('Delete successful category', $title = null, $options = []);
        return redirect('admin/product/listproduct');
    }
}
