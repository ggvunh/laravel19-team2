<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
      return view('page.trangchu');
    }
    public function list()
    {
      return view('page.list');
    }
    public function cart()
    {
      return view('page.cart');
    }
}
