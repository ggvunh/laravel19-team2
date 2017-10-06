<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
      return view('page.trangchu');
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
