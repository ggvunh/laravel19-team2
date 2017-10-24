<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class PDFController extends Controller
{
    public function getPDF()
    {
        $users = User::All();
        $pdf = PDF::loadView('pdf.order', compact('users'));
        return $pdf ->stream('order.pdf');
    }
}
