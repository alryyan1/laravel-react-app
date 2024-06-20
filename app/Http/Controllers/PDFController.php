<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Deduct;
use App\Models\Deposit;
use App\Models\DoctorShift;
use App\Models\Doctorvisit;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Package;
use App\Models\Patient;
use App\Models\RequestedResult;
use App\Models\Service;
use App\Models\Shift;
use App\Models\Shipping;
use App\Models\Whatsapp;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use App\Mypdf\Pdf;
use Illuminate\Support\Facades\DB;
use TCPDF_FONTS;
use Spatie\Permission\Models\Permission;

class PDFController extends Controller
{

    public function __construct()
    {
//        $this->middleware(['permission:add items']);

    }

    public function balance(){




        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('المخزون');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,'المخزون',0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
         $date =  new Carbon('now');
         $date  = $date->format('Y/m/d');
        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 5;
        $pdf->Cell($table_col_widht,5,'التاريخ ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$date,1,0,'C');
        $pdf->Cell($table_col_widht,5,'',0,1,'C');
        $table_col_widht = $page_width / 8;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht,5,'كود الصنف',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'الاسم ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'سعر الوحده ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'رصيد اول المده',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,' الاجمالي ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,"الوارد  ",1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,"المنصرف  ",1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,"الرصيد  ",1,1,'C',fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $items = \App\Models\Item::all();
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(DB::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct;
            $pdf->Cell($table_col_widht,5, $item->id,1,0,'C');
            $pdf->Cell($table_col_widht,5,$item->name,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->initial_price,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->initial_balance,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->initial_price * $item->initial_balance,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,  $total_deposit,1,0,'C');
            $pdf->Cell($table_col_widht,5,  $total_deduct,1,0,'C');
            $pdf->Cell($table_col_widht,5,  $item->remaining ,1,1,'C');
        }

        $pdf->Ln();

        $pdf->Output('example_003.pdf', 'I');
    }
    public function invnetoryIncome(Request $request)
    {

        $id = $request->query('id');
        $deposit = Deposit::find($id);



        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('اذن وارد');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,'اذن وارد',0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 5;
        $pdf->Cell($table_col_widht,5,'التاريخ ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$deposit->created_at->format('Y/m/d'),1,0,'C');
        $pdf->Cell($table_col_widht,5,'',0,0,'C');
        $pdf->Cell($table_col_widht,5,'المورد ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$deposit->supplier->name,1,1,'C',stretch:1);
        $table_col_widht = $page_width / 5;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht,5,'الرقم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'الصنف ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'الكميه ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,"الاجمالي  ",1,1,'C',fill: 1);
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;
        foreach ($deposit->items as $item){
            $pdf->Cell($table_col_widht,5,$index,1,0,'C');
            $pdf->Cell($table_col_widht,5, $item->name,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->pivot->quantity,1,0,'C');
            $pdf->Cell($table_col_widht,5,$item->pivot->price,1,0,'C');
            $pdf->Cell($table_col_widht,5,($item->pivot->quantity * $item->pivot->price),1,1,'C');
            $index++;
        }
        $pdf->Ln();
        $pdf->Cell($table_col_widht,5,'توقيع المستلم',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,"مدير المخزن  ",0,1,'C');
        $pdf->Cell($table_col_widht,5,' _ _ _ _ ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5," _ _ _ _ ",0,1,'C');
        $pdf->Output('example_003.pdf', 'I');

    }
    public function deductReport(Request $request)
    {

        $id = $request->query('id');
        $deduct = Deduct::find($id);



        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('اذن صرف');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);
        $table_col_widht = $page_width / 3;

        $pdf->Cell($page_width,5,'اذن صرف',0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
        $pdf->Cell($table_col_widht,5,'التاريخ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,"   ",0,1,'C');
        $pdf->Cell($table_col_widht,5,$deduct->created_at->format('Y-m-d'),0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,"",0,1,'C');
        $pdf->setFillColor(200,200,200);
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht,5,'الرقم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'الصنف ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'الكميه ',1,1,'C',fill: 1);
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;
        foreach ($deduct->items as $item){
            $pdf->Cell($table_col_widht,5,$index,1,0,'C');
            $pdf->Cell($table_col_widht,5, $item->name,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->pivot->quantity,1,1,'C');
            $index++;
        }
        $pdf->Ln();
        $pdf->Cell($table_col_widht,5,'توقيع المستلم',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5,"مدير المخزن  ",0,1,'C');
        $pdf->Cell($table_col_widht,5,' _ _ _ _ ',0,0,'C');
        $pdf->Cell($table_col_widht,5,' ',0,0,'C');
        $pdf->Cell($table_col_widht,5," _ _ _ _ ",0,1,'C');
        $pdf->Output('example_003.pdf', 'I');

    }
    public function labreport(Request $request)
    {



        $shift =  Shift::latest()->first();

        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('ورديه المعمل');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);

        $pdf->AddPage();

        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,'ورديه المعمل',0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 2;
        $pdf->Cell($table_col_widht,5,'التاريخ ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$shift->created_at->format('Y/m/d'),1,1,'C');

        $table_col_widht = ($page_width - 20) / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht/2,5,'الرقم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht + 20,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'القيمه ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'المدفوع ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht/2,5," التخفيض",1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht/2,5,"بنكك",1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht/2,5,"الشركه",1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht *2,5,"  الفحوصات",1,1,'C',fill: 1);

        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $index = 1;
        /** @var Patient $patient */
        foreach ($shift->patients as $patient){
            $y = $pdf->GetY();
            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width + PDF_MARGIN_RIGHT,$y);
            $pdf->Cell($table_col_widht/2,5,$patient->visit_number,0,0,'C');
            $pdf->Cell($table_col_widht + 20,5,$patient->name,0,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5, number_format($patient->total(),1),0,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,number_format($patient->paid_lab(),1),0,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht/2,5,$patient->discountAmount(),0,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht/2,5,$patient->bankak(),0,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht/2,5,$patient?->company->name ?? 'cash',0,0,'C',stretch: 1);
            $pdf->MultiCell($table_col_widht*2,5,$patient->tests_concatinated(),0,'L',false,stretch: 1);
            $pdf->Line(PDF_MARGIN_LEFT,$y,PDF_MARGIN_RIGHT,$y);

            $index++;
        }
        $pdf->Ln();
        $table_col_widht = ($page_width ) / 5;

        $pdf->Cell($table_col_widht,5,'الاجمالي',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht ,5,'  المدفوع',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'التخفيض ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'بنكك ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5," النقدي",1,1,'C',fill: 1);

        $pdf->Cell($table_col_widht,5,number_format($shift->totalLab(),1),1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht ,5,$shift->paidLab(),1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$shift->totalLabDiscount(),1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$shift->bankakLab(),1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$shift->paidLab() -$shift->bankakLab() ,1,1,'C',fill: 1);

        $pdf->Output('example_003.pdf', 'I');

    }
    public function result(Request $request){
         /** @var Patient $patient */
        $patient =  Patient::find($request->get('pid'));
        $pdf = new Pdf('portrait', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('alryyan mahjoob');
        $pdf->setTitle('النتيحه');
        $pdf->setSubject('patient lab result');
        $pdf->setMargins(PDF_MARGIN_LEFT, 70, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));

        $pdf->head = function ($pdf) use($patient,$page_width,$arial){
            $pdf->SetFont('aealarabiya', '', 18, '', true);


        $pdf->Cell($page_width, 5, 'اسم المستشفي', 0, 1, 'C');  //LAB NAME
        $pdf->Cell($page_width, 5, "قسم المختبر", 0, 1, 'C');  //LAB NAME
        $pdf->Ln(25);
            $y = $pdf->GetY();
            $pdf->SetFont($arial, '', 18, '', true);
            $table_col_widht = ($page_width ) / 4;
            $pdf->cell($table_col_widht/2, 5, "Date", 0, 0, 'C');
        $pdf->cell($table_col_widht, 5, $patient->created_at->format('Y-m-d') , 0, 0, 'C');
        $pdf->cell($table_col_widht *2, 5, $patient->name, 0, 0, 'R'); //patient name
        $pdf->cell($table_col_widht/2, 5, "الاسم/ ", 0, 1, 'R'); //
            $pdf->SetFont($arial, '', 15, '', true);

        $pdf->cell($table_col_widht/2, 5, "SN", 0, 0, 'C');
        $pdf->cell($table_col_widht, 5, $patient->id, 0, 0, 'C'); //age

        $pdf->cell($table_col_widht*2, 5, $patient->doctor->name, 0, 0, 'R'); // doctor name
        $pdf->cell($table_col_widht/2, 5, "د/ ", 0, 1, 'C');
        $requestedTests = $patient->tests_concatinated();
        $pdf->Line(6, 43, 205, 43); //THIRD [H]
        if ($pdf->PageNo() == 1) {
            $pdf->Line(6, 5, 205, 5); //TOP LINE [H]
            $pdf->Line(6, 42, 205, 42); //SECOND [H]
            $pdf->Line(6, 68, 205, 68); //THIRD [H]
            $pdf->Line(6, 42, 6, 280); //line between 2 points
            $pdf->Line(205, 42, 205, 280); //line between 2 points
            $pdf->SetFont($arial, '', 10, '', true);
            // $pdf->cell(25, 5, "", 0, 1, 'L');
            $pdf->cell(25, 5, "Requested: ", 0, 0, 'L');
            $pdf->MultiCell(170, 5, "$requestedTests", 0, 'L', 0, 1, '', '', true);
//            $pdf->Ln(50);
        } else {
            $pdf->Line(6, 43, 6, 280); //line between 2 points

            $pdf->Line(205, 43, 205, 280); //line between 2 points
        }
        };
        $pdf->AddPage();
        //$pdf->Ln(25);
        $pdf->SetFillColor(240, 240, 240);
        $page_height = $pdf->getPageHeight() - PDF_MARGIN_TOP  ;
        $pdf->SetFont('aealarabiya', '', 10, '', true);
        $mypakages  = Package::all();

        foreach ($mypakages as $package) {
            $show_headers = true;
            $main_test_array =  $patient->labrequests->filter(function ($item) use ($package){
                return  $item->mainTest->pack_id == $package->package_id;
            });
            /** @var LabRequest $m_test */
            foreach ($main_test_array as $m_test) {
                if ($m_test->hidden == 0) continue;
                $children_count = count($m_test->requested_results);
                $number_of_lines_in_normal_range = 0;
                $total_lines = 0;
                /** @var RequestedResult $requested_result */
                foreach ($m_test->requested_results as $requested_result) {
                    $nr = $requested_result->normal_range;
                    $number_of_lines_in_normal_range =  substr_count($nr, "\n");
                    $lines_in_result =  substr_count($requested_result->result, "\n");
                    $total_lines+= max($lines_in_result,$number_of_lines_in_normal_range);
                }
                $number_of_lines_in_normal_range = $number_of_lines_in_normal_range / 2;
                $number_of_lines_in_normal_range = $total_lines * 5;
                $requared_height = ($children_count * 5)  + $number_of_lines_in_normal_range;
                $y = $pdf->GetY();

                $remaing_height = $page_height - $y - 15;
//                $pdf->cell(40, 5, "requared_height $requared_height  ------------    remaing_height $remaing_height", 0, 1); //blank cell for heighht

                if ($remaing_height <= $requared_height) {
                    $pdf->addpage();


                }


                $has_more_than1_child = false;
                if ($children_count > 1) {
                    $has_more_than1_child = true;
                }
                if ($has_more_than1_child == false) {

                    $table_col_widht = ($page_width ) / 4;

                    if ($show_headers){
                        $pdf->cell($table_col_widht, 5, "Test", 1, 0, 'C', 1);
                        $pdf->cell($table_col_widht*1.5, 5, "Result", 1, 0, 'C', 1);
                        $pdf->cell($table_col_widht/2, 5, "Unit", 1, 0, 'C', 1);
                        $pdf->cell($table_col_widht, 5, "R.Values", 1, 1, 'C', 1);
                    }


                    $show_headers = false;
                }
                if ($has_more_than1_child) //only show main test name if has more than 1 child test
                {
                    $table_col_widht = ($page_width ) / 4;

                    $pdf->SetFont($arial, 'u', 17, '', true);
                    $pdf->cell(40, 5, $m_test->mainTest->main_test_name, 0, 1, 'L'); // main
                    $pdf->Ln();

                    $pdf->SetFont($arial, '', 11, '', true);
                    $y = $pdf->GetY();

                    $pdf->cell($table_col_widht, 5, "Test", 1, 0, 'C', 1);
                    $pdf->cell($table_col_widht*1.5, 5, "Result", 1, 0, 'C', 1);
                    $pdf->cell($table_col_widht/2, 5, "Unit", 1, 0, 'C', 1);
                    $pdf->cell($table_col_widht, 5, "R.Values", 1, 1, 'C', 1);
                }
                $old = '';

                /** @var RequestedResult $result */
                foreach ($m_test->requested_results as $result) {
                        $child_test = $result->childTest;
                        $y = $pdf->GetY();
                    if ($result->childTest->childGroup?->name != null){
                        $new = $result->childTest->childGroup?->name;
                        if ($old != $new){
                            $old = $result->childTest->childGroup?->name;
                            $pdf->SetFont($arial, 'u', 14, '', true);

                            $pdf->cell(40, 5, $old, 0, 1);
                            $pdf->SetFont($arial, '', 12, '', true);


                        }

                        if ($old !=''){
                            if ($old != $new) {
                            }

                        }

                    }
                        $unit = $child_test->unit->name;
                        $normal_range = $result->normal_range;
                        $child_id = $child_test->id;
                    $table_col_widht = ($page_width ) / 4;
                    $resultCellHeight = 5;
                    $pdf->cell($table_col_widht, 5, $child_test->child_test_name, 0, 0, 'C'); // test name
                        $report_result = $result->result;
                    $pdf->SetFont('dejavusans', 'b', 11, '', true);

                    if (($child_id == 46 || $child_id == 70 || $child_id == 213) && $report_result != '' && is_numeric($report_result)) {
                                $percent =  ($report_result / 15) * 100;
                                $percent = ceil($percent);

                                $resultCellHeight =     $pdf->MultiCell($table_col_widht * 1.5 , 5, "$report_result         $percent % ", 0, 'C', 0, 0, '', '', true);
                            } else {

                                $resultCellHeight =     $pdf->MultiCell($table_col_widht * 1.5 , 5, "$report_result", 0, 'C', 0, 0, '', '', true);

                            }
                    $pdf->SetFont($arial, '', 10, '', true);

                        $pdf->cell($table_col_widht/2, 5, "$unit", 0, 0, 'C', 0, '', 1); // unit
                        $normalRangeCellHeight =   $pdf->MultiCell($table_col_widht, 5, "$normal_range", 0, 'C', 0, 1, '', '', true);
                        $y = $pdf->GetY();
                        $highestValue =   max([$normalRangeCellHeight,$resultCellHeight]);

                      if($resultCellHeight > $normalRangeCellHeight){
                            //caclulate additional height
                           $additional_height =   $resultCellHeight  * 5  - ($normalRangeCellHeight * 5);
                            $pdf->Line(PDF_MARGIN_LEFT,$y+$additional_height ,$page_width + PDF_MARGIN_RIGHT,$y+$additional_height);

                        }else{
                        $pdf->Line(PDF_MARGIN_LEFT,$y ,$page_width + PDF_MARGIN_RIGHT,$y);

                    }


                    }
                    $pdf->cell(1, 5, "", 0, 1, 'C'); // bcforh
                    $comment = '';

                    if (str_word_count($comment) > 0) {

                        $pdf->cell(20, 5, "Comment", 0, 1, 'C'); // bcforh
                        $y = $pdf->GetY();
                        $pdf->Line(10, $y, 30, $y); //line between 2 points
                        $pdf->cell(20, 5, "", 0, 1, 'C'); // bcforh
                        $pdf->MultiCell(189, 5, $comment, 1, "", 1);
                    }

            }
        }
            $pdf->output();
    }
    public function clinicsReport(Request $request)
    {



        $shift =  Shift::latest()->first();
        $user_id =  $request->get('user');
        $doctor_shifts =  DoctorShift::with(['doctor','visits'])->where('user_id',$user_id)->where('status',1)->where('shift_id',$shift->id)->get();


        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('العيادات');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,'العيادات',0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 6;
        $pdf->Cell($table_col_widht,5,'التاريخ ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$shift->created_at->format('Y/m/d'),1,1,'C');

        $table_col_widht = ($page_width - 20) / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        /** @var DoctorShift $doctor_shift */
        $doc_count = 0;
        foreach ($doctor_shifts as $doctor_shift){
            $doc_count++;
            if ($pdf->getPage() == 1){
                if ($doc_count == 2){
                    $pdf->AddPage();
                }
            }else{
                $pdf->AddPage();

            }
            $table_col_widht = ($page_width ) / 6;

            $pdf->Cell($table_col_widht,5,'الطبيب',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,$doctor_shift->doctor->name,1,0,'C',fill: 0,stretch: 1);
            $pdf->Cell($table_col_widht,5,'',0,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,'',0,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,'زمن فتح العياده',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,$doctor_shift->created_at->format('h:i:s'),1,1,'C',fill: 0);
            $pdf->Ln();
            $pdf->Cell('30',5,'المرضي',1,1,'C',fill: 0);
            $pdf->Ln();
            $table_col_widht = ($page_width ) / 6;

            $pdf->Cell($table_col_widht,5,'الكود',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'اسم',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'المدفوع',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'نصيب الطبيب',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'نصيب المركز',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'الخدمات',1,1,'C',fill: 1);
            $pdf->Ln();
            $pdf->setFont($fontname, 'b', 12);
            $total_hospital = 0;
            $total_doctor = 0;
            $total_paid = 0;

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctor_shift->visits as $doctorvisit){
                $y =  $pdf->GetY();
                $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width +PDF_MARGIN_RIGHT,$y);
                $pdf->Cell($table_col_widht,5,$doctorvisit->patient->id,0,0,'C',fill: 0);
                $pdf->Cell($table_col_widht,5,$doctorvisit->patient->name,0,0,'C',fill: 0);
                $pdf->Cell($table_col_widht,5 ,number_format( $doctorvisit->total_paid_services(),1),0,0,'C',fill: 0);
                $total_paid+= $doctorvisit->total_paid_services();
                $pdf->Cell($table_col_widht,5 ,number_format( $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit),1),0,0,'C',fill: 0);
                $total_doctor +=  $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit);
                $pdf->Cell($table_col_widht,5 ,number_format( $doctorvisit->total_paid_services() - $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit),1),0,0,'C',fill: 0);
                $total_hospital += $doctorvisit->total_paid_services() - $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit);
                $pdf->MultiCell($table_col_widht,5,$doctorvisit->services_concatinated(),0,'R',false,stretch: 1);
                $y =  $pdf->GetY();

                $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width +PDF_MARGIN_RIGHT,$y);


            }
            $pdf->Ln();
            $pdf->Ln();
            $table_col_widht = ($page_width ) / 6;

            $pdf->Cell($table_col_widht,5,'',1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,'',1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5 , number_format($total_paid,1) ,1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5, number_format( $total_doctor,1),1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,number_format($total_hospital,1),1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'',1,1,'C',fill: 0);

        }


        $pdf->Output('example_003.pdf', 'I');

    }
    public function allclinicsReport(Request $request)
    {




        $shift =  Shift::latest()->first();
        $user_id =  $request->get('user');
        $doctor_shifts =  DoctorShift::with(['doctor','visits'])->where('user_id',$user_id)->where('status',1)->where('shift_id',$shift->id)->get();


        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('العيادات');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,'تقرير العيادات العام',0,1,'C');
        $pdf->setFont($fontname, 'b', 14);
        $table_col_widht = ($page_width ) / 6;

        $pdf->Cell($table_col_widht,5,"التاريخ",0,0,'L');
        $pdf->Cell($table_col_widht,5,"".$shift->created_at->format('Y/m/d'),0,0,'R');
        $pdf->Cell($table_col_widht* 2,5,"رقم الورديه المالي ".$shift->id,0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = ($page_width ) / 6;

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        /** @var DoctorShift $doctor_shift */
        $doc_count = 0;
        $pdf->Cell($table_col_widht,5,'التخصص',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'الطبيب',1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,'اجمالي المدفوع',1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,'نصيب الطبيب النقدي',1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,'نصيب الطيب من التامين',1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,'صافي المركز',1,1,'C',fill: 0,stretch: 1);
        $pdf->Ln();
        $total_total = 0;
        $total_doctor_cash = 0;
        $total_doctor_isnu = 0;
        $total_hosptal = 0;
        foreach ($doctor_shifts as $doctor_shift){


            $pdf->Cell($table_col_widht,5,$doctor_shift->doctor->specialist->name,1,0,'C',fill: 1,stretch: true);
            $pdf->Cell($table_col_widht,5,$doctor_shift->doctor->name,1,0,'C',fill: 0,stretch: 1);
            $total = $doctor_shift->total();
            $total_total+= $total;
            $pdf->Cell($table_col_widht,5,number_format($total,1),1,0,'C',fill: 0,stretch: 1);
            $doctor_cash =   $doctor_shift->doctor_credit_cash();
            $total_doctor_cash+= $doctor_cash;
            $pdf->Cell($table_col_widht,5,number_format($doctor_cash,1),1,0,'C',fill: 0,stretch: 1);
            $doctor_isnu =  $doctor_shift->doctor_credit_company();
            $total_doctor_isnu += $doctor_isnu;
            $pdf->Cell($table_col_widht,5,number_format($doctor_isnu,1),1,0,'C',fill: 0,stretch: 1);
            $hospital = $doctor_shift->hospital_credit();
            $total_hosptal+= $hospital;
            $pdf->Cell($table_col_widht,5,number_format($hospital,1),1,0,'C',fill: 0,stretch: 1);
            $pdf->Ln();

        }
        $pdf->Ln();

        $pdf->Cell($table_col_widht,5,'',1,0,'C',fill: 1,stretch: true);
        $pdf->Cell($table_col_widht,5,'',1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,number_format($total_total,1),1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,number_format($total_doctor_cash,1),1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,number_format($total_doctor_isnu,1),1,0,'C',fill: 0,stretch: 1);
        $pdf->Cell($table_col_widht,5,number_format($total_hosptal,1),1,0,'C',fill: 0,stretch: 1);

        $pdf->Output('example_003.pdf', 'I');

    }
    public function clinicReport(Request $request)
    {




        $user_id =  $request->get('user');
        $doctor_shift_id =  $request->get('doctorshift');
        $doctorShift =  DoctorShift::find($doctor_shift_id);


        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('التقرير الخاص');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,'التقرير الخاص',0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 6;
        $pdf->Cell($table_col_widht,5,'التاريخ ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,$doctorShift->created_at->format('Y/m/d'),1,1,'C');

        $table_col_widht = ($page_width - 20) / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
            $table_col_widht = ($page_width ) / 6;

            $pdf->Cell($table_col_widht,5,'الطبيب',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,$doctorShift->doctor->name,1,0,'C',fill: 0,stretch: 1);
            $pdf->Cell($table_col_widht,5,'',0,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,'',0,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,'زمن فتح العياده',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,$doctorShift->created_at->format('h:i:s'),1,1,'C',fill: 0);
            $pdf->Ln();
            $pdf->Cell('30',5,'المرضي',1,1,'C',fill: 0);
            $pdf->Ln();
            $table_col_widht = ($page_width ) / 6;

            $pdf->Cell($table_col_widht,5,'الكود',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'اسم',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'المدفوع',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'نصيب الطبيب',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'نصيب المركز',1,0,'C',fill: 1);
            $pdf->Cell($table_col_widht,5,'الخدمات *',1,1,'C',fill: 1);
            $pdf->Ln();
            $pdf->setFont($fontname, 'b', 12);

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
                $y =  $pdf->GetY();
                $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width +PDF_MARGIN_RIGHT,$y);

                $pdf->Cell($table_col_widht,5,$doctorvisit->id,0,0,'C',fill: 0);
                $pdf->Cell($table_col_widht,5,$doctorvisit->patient->name,0,0,'C',fill: 0);
                $pdf->Cell($table_col_widht,5 ,number_format( $doctorvisit->total_paid_services($doctorShift->doctor),1),0,0,'C',fill: 0);
                $pdf->Cell($table_col_widht,5 ,number_format( $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit),1),0,0,'C',fill: 0);
                $pdf->Cell($table_col_widht,5 ,number_format( $doctorvisit->total_paid_services($doctorShift->doctor) -$doctorShift->doctor->doctor_credit($doctorvisit),1),0,0,'C',fill: 0);
                $pdf->MultiCell($table_col_widht,5,$doctorvisit->services_concatinated_specfic($doctorShift->doctor),0,'R',false,stretch: 1);
                $y =  $pdf->GetY();

                $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width +PDF_MARGIN_RIGHT,$y);



            $pdf->Ln();


        }


        $pdf->Output('example_003.pdf', 'I');

    }
    public function companyTest(Request $request,Company $company)
    {
        $company->load('tests');
//        dd($company);



        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
//        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('التامين');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,$company->name,0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 2;

        $table_col_widht = ($page_width ) / 6;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        $pdf->Ln();

        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,1,'C',fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $pdf->setEqualColumns(3,$page_width / 3 );
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $index = 1;
        $table_col_widht = ($page_width ) / 6;

        /** @var MainTest $test */
        foreach ($company->tests as $test){
            $y = $pdf->GetY();
//            dd($test);
            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width +PDF_MARGIN_RIGHT,$y);
            $pdf->Cell($table_col_widht,5,$test->main_test_name,0,0,'C',fill: true,stretch: true);
            $pdf->Cell($table_col_widht,5,number_format($test->pivot->price,1) ,0,1,'C');
            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width +PDF_MARGIN_RIGHT,$y);

            $index++;
        }
        $pdf->Ln();

        $pdf->Output('example_003.pdf', 'I');

    }
    public function companyService(Request $request,Company $company)
    {
        $company->load('services');
//        dd($company);



        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('التامين');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width,5,$company->name,0,1,'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $table_col_widht = $page_width / 2;

        $table_col_widht = ($page_width ) / 6;
        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 1);
        $pdf->Cell($table_col_widht,5,'السعر ',1,1,'C',fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $pdf->setEqualColumns(3,$page_width / 3 );
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $index = 1;


        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;

        /** @var Service $service */
        foreach ($company->services as $service){
            $y = $pdf->GetY();
//            dd($service);
            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width + PDF_MARGIN_RIGHT ,$y);
            $pdf->Cell($table_col_widht,5,$service->name,0,0,'C',fill: true,stretch: true);
            $pdf->Cell($table_col_widht,5,$service->pivot->price,0,1,'C');

            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width + PDF_MARGIN_RIGHT ,$y);

            $index++;
        }
        $pdf->Ln();

        $pdf->Output('example_003.pdf', 'I');

    }
    public function shipping(Request $request,$phone=null,$wb = false )
    {
//        dd($company);



        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('shippings');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT ;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200,200,200);
        $shippings = Shipping::all();
        $table_col_widht = ($page_width ) / 9;
        $pdf->Cell($table_col_widht ,5,'  الاسم',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'رقم الهاتف ',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'الصنف ',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht ,5,'  اكسبرس',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'CTN',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'CBM',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'KG',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'التاريخ',1,0,'C',fill: 0);
        $pdf->Cell($table_col_widht,5,'الحاله',1,1,'C',fill: 0);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $index = 1;


        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;

            /** @var Shipping $shipping */
        foreach ($shippings as $shipping){
            $y = $pdf->GetY();
//            dd($service);
            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width + PDF_MARGIN_RIGHT ,$y);
            $pdf->Cell($table_col_widht ,5,$shipping->name,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,$shipping->phone,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5, $shipping->item->name,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht ,5,$shipping->express,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,$shipping->ctn,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,$shipping->cbm,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,$shipping->kg,1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,$shipping->created_at->format('Y/m/d'),1,0,'C',fill: 0);
            $pdf->Cell($table_col_widht,5,$shipping?->state?->name ?? '',1,1,'C',fill: 0);

            $pdf->Line(PDF_MARGIN_LEFT,$y,$page_width + PDF_MARGIN_RIGHT ,$y);

            $index++;
        }
        $pdf->Ln();

        if ($wb){
            $result_as_bs64 =  $pdf->output('name.pdf', 'S');
            Whatsapp::sendPdf($result_as_bs64,$phone);
        }else{
            $pdf->Output('example_003.pdf', 'I');

        }


    }

}
