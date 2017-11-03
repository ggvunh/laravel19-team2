<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Excel;

class ExcelController extends Controller
{
    public function ExportExcel()
    {
        $users = User::select('name', 'email', 'address', 'phone_number', 'gender')->get();
        Excel::create('Export User', function($excel) use($users)
        {
            $excel ->sheet('Excel sheet', function($sheet) use($users)
            {
                $sheet->fromArray($users);
            });
            $excel->setTitle('Our new awesome title');
            $excel->setCreator('Maatwebsite')
                  ->setCompany('Maatwebsite');
            $excel->setDescription('A demonstration to change the file properties');
        })->export('xls');
    }
}
