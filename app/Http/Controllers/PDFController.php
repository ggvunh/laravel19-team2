<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billdetail;
use PDF;
Use App\Bill;
use App\User;

class PDFController extends Controller
{
    public function getPDF($id)
    {
        $exportdetails = BillDetail::where('bill_id', $id)->get();
        $bill = Bill::find($id);
        $user = User::where('id',$bill->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.order', compact('exportdetails', 'id', 'bill', 'user'));
        $filename = "$user->name". '_orderdetail.pdf';
        return $pdf ->stream("$filename");
    }
}
