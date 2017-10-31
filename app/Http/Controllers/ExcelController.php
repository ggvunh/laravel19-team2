<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Excel;

class ExcelController extends Controller
{
    public function ExportExcel()
    {
        $export = User::select('name', 'email', 'address', 'phone_number', 'gender')->get();
        Excel::Create('Export User', function($excel) use($export)
        {
            $excel->setTitle('Our new awesome title');
            $excel->setCreator('Maatwebsite')
                  ->setCompany('Maatwebsite');
            $excel->setDescription('A demonstration to change the file properties');
            $excel ->sheet('Excel sheet', function($sheet) use($export)
            {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }
}
