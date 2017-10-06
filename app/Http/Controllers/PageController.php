<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
      $hot_products = product::where('hot', 1)->get();
      return view('page.trangchu', compact('hot_products'));

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
