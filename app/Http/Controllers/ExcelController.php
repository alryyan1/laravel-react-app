<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\Item;
use App\Models\MainTest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    public function itemsClientOrders(Request $request){


        $style = [
            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                 'startColor'=>[
                     'rgb'=>'538ED5'
                 ]
            ]
        ];
        $spreadsheet = new Spreadsheet();
//        $spreadsheet->getActiveSheet()->getStyle('C3:G3')->applyFromArray($style);
        $arrayData = [];
        $items = Item::all();

        $headerArr = $items->map(function ($item){
           return $item->market_name;
        });
//        dd($headerArr);
        $arrayData[] = $headerArr;
        $data = $request->all();
        $first = Carbon::createFromFormat('Y/m/d', $data['first'])->startOfDay();
        $second = Carbon::createFromFormat('Y/m/d', $data['second'])->endOfDay();
        $deducts =  Deduct::whereBetween('created_at',[$first,$second])->get();
        $letters_arr = ['C','D','E','F','G','H','I','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH'];
        $number = 4;
        $column_start = 0;

        /** @var Item $item */
        foreach ($items as $item){
//            dd($deducts);

            $pos = $letters_arr[$column_start]."3";

            $spreadsheet->getActiveSheet()->setCellValue($pos,$item->market_name);

            $childArr = [];
            $childArr[] = $item->market_name;
            $arr = $deducts->map(function (Deduct $deduct)use($item,$spreadsheet,$letters_arr,$column_start){
                $row_start = 4;
                $pos = $letters_arr[$column_start]."$row_start";
                $spreadsheet->getActiveSheet()->getColumnDimension($letters_arr[$column_start])->setAutoSize(true);

                $arr_ids =   $deduct->deductedItems->map(function ($di){
                    return $di->item->id;
                });
                if ($arr_ids->contains($item->id)){
                   $spreadsheet->getActiveSheet()->setCellValue($pos,$deduct?->client?->name.' ('. $deduct?->client?->address.' )'.' ('. $deduct?->client?->phone.' )');
                }
                $row_start++;
            });
            $column_start++;

//            $arrayData[] = $childArr;

        }
//        $spreadsheet->getActiveSheet()->getStyle('F:F')
//            ->getNumberFormat()
//            ->setFormatCode(
//                \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME
////            );
//        $spreadsheet->getActiveSheet()
//            ->fromArray(
//                $arrayData,  // The data to set
//                NULL,        // Array values with this value will not be set
//                'B3'         // Top left coordinate of the worksheet range where
//            //    we want to set these values (default is A1)
//            );


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
