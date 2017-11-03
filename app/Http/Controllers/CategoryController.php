<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\addCategoryRequest;
use Toastr;

class categoryController extends Controller
{
    public function listCategories()
    {
        $categories = Category::All();
        return view('admin.categories.list-all-categories', compact('categories'));
    }

    public function getAddCategories()
    {
        $menus = Menu::All();
        return view('admin.categories.add-categoryProduct', compact('menus'));
    }

    public function postAddCategories(Request $rq, addCategoryRequest $request)
    {
        $data = new Category;
        $data->name = $rq->input('cateproduct-name');
        $data->menu_id = $rq->input('menu');
        $data->save();
        Toastr::success('Add successful category', $title = null, $options = []);
        return redirect('admin/category/listcategories');
    }

    public function getEditCategories($id)
    {
        $category = Category::find($id);
        $menus = Menu::All();
        return view('admin.categories.edit-category', compact('category', 'menus'));
    }

    public function postEditCategories($id ,Request $rq)
    {
        $data = Category::find($id);
        $data ->name = $rq->input('category-name');
        $data ->menu_id = $rq->input('menu');
        $data->update();
        Toastr::success('Edit successful category', $title = null, $options = []);
        return redirect('admin/category/listcategories');
    }

    public function deleteCategories ($id)
    {
        $data = Category::find($id);
        $data ->product()->delete();
        $data->delete();
        Toastr::success('Delete successful category', $title = null, $options = []);
        return redirect('admin/category/listcategories');
    }
}
