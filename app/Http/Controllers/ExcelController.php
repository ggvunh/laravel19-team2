<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bill;
use Excel;

class ExcelController extends Controller
{
    public function ExportUser()
    {
        $users = User::All();
        Excel::create('Users', function($excel) use($users)
        {
            $excel ->sheet('Excel sheet', function($sheet) use($users)
            {
                $sheet->fromArray($users);
            });
            ob_end_clean(); ob_start();
        })->export('xlsx');
    }

    public function ExportOrder()
    {
        $orders = Bill::All();
        Excel::create('Orders', function($excel) use($orders)
        {
            $excel ->sheet('Excel sheet', function($sheet) use($orders)
            {
                $sheet->fromArray($orders);
            });
            ob_end_clean(); ob_start();
        })->export('xlsx');
    }
}
