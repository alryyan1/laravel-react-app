<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\MainTest;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Engine\FormattedNumber;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ExcelController extends Controller
{
    public function items(Request $request){


        $style = [
            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                 'startColor'=>[
                     'rgb'=>'538ED5'
                 ]
            ]
        ];
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getStyle('C3:G3')->applyFromArray($style);
        $arrayData = [];
        $headerArr = ['Name','Cost Price','Selling Price','Expire Date','Barcode'];
        $arrayData[] = $headerArr;

        $items = Item::all();
        /** @var Item $item */
        foreach ($items as $item){
            $childArr = [];
            $childArr[] = $item->market_name;
            $childArr[] = $item->cost_price;
            $childArr[] = $item->sell_price;
            $childArr[] = $item->expire;
            $childArr[] = $item->barcode;
            $arrayData[] = $childArr;

        }
        $spreadsheet->getActiveSheet()->getStyle('F:F')
            ->getNumberFormat()
            ->setFormatCode(
                \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME
            );
        $spreadsheet->getActiveSheet()
            ->fromArray(
                $arrayData,  // The data to set
                NULL,        // Array values with this value will not be set
                'C3'         // Top left coordinate of the worksheet range where
            //    we want to set these values (default is A1)
            );
        $styleArray = [
            'borders' => [
                'bottom' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FFFF0000']],
                'top' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FFFF0000']],
                'right' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FF00FF00']],
                'left' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FF00FF00']],
            ],
        ];
//        $spreadsheet->getActiveSheet()->getStyle('G:G')->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode('data.xlsx').'"');
        $writer->save('php://output');
        exit();
    }
    public function lapPrices(Request $request){


        $style = [
            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                 'startColor'=>[
                     'rgb'=>'538ED5'
                 ]
            ]
        ];
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getStyle('C3:G3')->applyFromArray($style);
        $arrayData = [];
        $headerArr = ['Name',' Price'];
        $arrayData[] = $headerArr;

        $items = MainTest::all();
        /** @var MainTest $item */
        foreach ($items as $item){
            $childArr = [];
            $childArr[] = $item->main_test_name;
            $childArr[] = $item->price;
            $arrayData[] = $childArr;

        }
        $spreadsheet->getActiveSheet()->getStyle('F:F')
            ->getNumberFormat()
            ->setFormatCode(
                \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME
            );
        $spreadsheet->getActiveSheet()
            ->fromArray(
                $arrayData,  // The data to set
                NULL,        // Array values with this value will not be set
                'C3'         // Top left coordinate of the worksheet range where
            //    we want to set these values (default is A1)
            );
        $styleArray = [
            'borders' => [
                'bottom' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FFFF0000']],
                'top' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FFFF0000']],
                'right' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FF00FF00']],
                'left' => ['borderStyle' => 'hair', 'color' => ['argb' => 'FF00FF00']],
            ],
        ];
//        $spreadsheet->getActiveSheet()->getStyle('G:G')->applyFromArray($styleArray);

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode('data.xlsx').'"');
        $writer->save('php://output');
        exit();
    }
}
