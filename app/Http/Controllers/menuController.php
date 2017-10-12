<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
class menuController extends Controller
{
    public function listMenu()
    {
        return view('admin.menus.menu');
    }

    public function createMenu()
    {
        return view('admin.menus.addMenu');
    }

    public function saveMenu(Request $rq)
    {
        $menu=new Menu();
        $menu->name=$rq->input('menu');
        $menu->save();
        return redirect()->route('listmenu');
    }

    public function editMenu($id)
    {
        $menu=Menu::where('id',$id)->get();
        return view('admin.menus.editMenu', compact('menu'));
    }

    public function updateMenu(Request $req)
    {
        $id=$req->input('id');
        $name = $req->input('name');
        $menu=Menu::where('id',$id)->update(['name'=>$name]);
        return redirect()->route('listmenu');
    }

    public function deleteMenu($id)
    {
        $menu =Menu::where('id',$id)->delete();
        return redirect()->route('listmenu');
    }

}
