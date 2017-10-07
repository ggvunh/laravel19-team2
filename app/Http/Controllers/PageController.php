<?php

namespace App\Http\Controllers;

use App\Product;
use App\Menu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $menus=Menu::all();
        // var_dump($menus);
        $hot_products = product::where('hot', 1)->get();
        $new_products = product::where('new', 1)->get();
        $deal_products = product::where('deals', 1)->get();
        $products = product::all();
        return view('page.trangchu', compact('hot_products', 'new_products', 'deal_products', 'products'));
        return view('partials.header', compact('$menus'));
    }
    public function getSanPham()
    {
      return view('page.sanpham');

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

}
