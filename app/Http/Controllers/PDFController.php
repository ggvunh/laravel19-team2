<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billdetail;
use PDF;

class PDFController extends Controller
{
    public function getPDF($id)
    {
        $exportdetails = BillDetail::where('bill_id', $id)->get();
        $pdf = PDF::loadView('admin.pdf.order', compact('exportdetails', 'id'));
        $filename = time(). "_orderdetail.pdf";
        return $pdf ->stream("$filename");
    }
}
