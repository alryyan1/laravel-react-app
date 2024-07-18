<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcellController extends Controller
{
    public function export()
    {
//        return Excel::download(new UsersExport, 'users.xlsx');
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Name');
        $activeWorksheet->setCellValue('B1', 'Price');
        $activeWorksheet->setCellValue('C1', 'Category');
        $activeWorksheet->setCellValue('D1', 'Expire Date');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=data.xlsx");
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }


}
