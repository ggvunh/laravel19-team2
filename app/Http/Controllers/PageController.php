<?php

namespace App\Http\Controllers;

use App\Product;
use App\Menu;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function getIndex()
    {
        $menus= Menu::all();
        $hot_products = Product::where('hot', 1)->get();
        $new_products = Product::where('new', 1)->get();
        $deal_products = Product::where('deals', 1)->get();
        $products = Product::all();
        return view('page.trangchu', compact('hot_products', 'new_products', 'deal_products', 'products'));
    }
    public function getSanPham()
    {
        $products = Product::all();
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


}
