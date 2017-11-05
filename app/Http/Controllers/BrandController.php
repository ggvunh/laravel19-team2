<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\addBrandRequest;
use App\Http\Requests\editBrandRequest;
use Toastr;

class brandController extends Controller
{
    public function listBrands()
    {
        $brands = Brand::All();
        return view('admin.brands.list-all-brands', compact('brands'));
    }

    public function getAddBrand()
    {
        return view('admin.brands.add-brand');
    }
     public function postAddBrand(Request $rq, addBrandRequest $request)
     {
         $data = new Brand;
         $data->name=$rq->input('brand-name');
         $data->logo=$rq->input('brand-image');
         if($request->hasFile('brand-image'))
         {
             $file = $request->file('brand-image');
             $filename = $file->getClientOriginalName('brand-image');
             $images = time() . "_" . $filename;
             $destinationPath = public_path('/images/brand');
             $file->move($destinationPath, $images);
             $data['logo'] = $images;
         }
         else
         {
          $data['logo'] = '';
         }
         $data->save();
         Toastr::success('Add successful brand', $title = null, $options = []);
         return redirect('admin/brand/listbrands');
     }

     public function getEditBrands($id)
     {
         $brand = Brand::find($id);
         return view('admin.brands.edit-brand', compact('brand'));
     }

     public function postEditBrands($id ,Request $rq, editBrandRequest $request )
     {
         $data = Brand::find($id);
         $data ->name = $rq->input('brand-name');
         $data ->logo = $rq->input('brand-image');
         if($request->hasFile('brand-image'))
         {
             $file = $request->file('brand-image');
             $filename = $file->getClientOriginalName('brand-image');
             $images = time() . "_" . $filename;
             $destinationPath = public_path('/images/brand');
             $file->move($destinationPath, $images);
             $data['logo'] = $images;
             $oldfile = $data->logo;
             Storage::delete($oldfile);
             $data->logo = $images;
         }
         else
         {
          $data['logo'] = '';
         }
         $data->save();
         Toastr::success('Add successful brand', $title = null, $options = []);
         return redirect('admin/brand/listbrands');
     }
     public function deleteBrands ($id)
     {
         $data = Brand::find($id);
         $data ->product()->delete();
         $data->delete();
         Toastr::success('Delete successful brand', $title = null, $options = []);
         return redirect('admin/brand/listbrands');
     }
}
