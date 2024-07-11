<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Cost;
use App\Models\Deduct;
use App\Models\DeductedItem;
use App\Models\Deposit;
use App\Models\DoctorShift;
use App\Models\Doctorvisit;
use App\Models\Item;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Package;
use App\Models\Patient;
use App\Models\RequestedResult;
use App\Models\Service;
use App\Models\Setting;
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

    public function balance()
    {


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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, 'المخزون', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
        $date = new Carbon('now');
        $date = $date->format('Y/m/d');
        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 5;
        $pdf->Cell($table_col_widht, 5, 'التاريخ ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $date, 1, 0, 'C');
        $pdf->Cell($table_col_widht, 5, '', 0, 1, 'C');
        $table_col_widht = $page_width / 8;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht, 5, 'كود الصنف', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الاسم ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'سعر الوحده ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'رصيد اول المده', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, ' الاجمالي ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, "الوارد  ", 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, "المنصرف  ", 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, "الرصيد  ", 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $items = \App\Models\Item::all();
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(DB::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct;
            $pdf->Cell($table_col_widht, 5, $item->id, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, $item->name, 1, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, $item->initial_price, 1, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, $item->initial_balance, 1, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, $item->initial_price * $item->initial_balance, 1, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, $total_deposit, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, $total_deduct, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, $item->remaining, 1, 1, 'C');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, 'فاتوره وارد', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, '', 12);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 5;
        $pdf->Cell($table_col_widht, 5, 'تاريخ الانشاء ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $deposit->created_at->format('Y/m/d'), 1, 0, 'C');
        $pdf->Cell($table_col_widht, 5, '', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, 'المورد ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $deposit->supplier->name, 1, 1, 'C', stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'رقم الفاتوره ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $deposit->bill_number, 1, 0, 'C');
        $pdf->Cell($table_col_widht, 5, '', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, 'تاريخ الفاتوره ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $deposit->bill_date, 1, 1, 'C', stretch: 1);
        $table_col_widht = $page_width / 5;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht, 5, 'الرقم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الصنف ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الكميه ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, "الاجمالي  ", 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 10);

        $index = 1;
        foreach ($deposit->items as $deposit_item) {
            $pdf->Cell($table_col_widht, 5, $index, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, $deposit_item->item->name  == '' ? $deposit_item->item->market_name : '', 1, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, $deposit_item->quantity, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, $deposit_item->price, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, (number_format($deposit_item->quantity * $deposit_item->price,1)), 1, 1, 'C');
            $index++;
        }
        $pdf->Ln();
//        $pdf->Cell($table_col_widht, 5, 'توقيع المستلم', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, "مدير المخزن  ", 0, 1, 'C');
//        $pdf->Cell($table_col_widht, 5, ' _ _ _ _ ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
//        $pdf->Cell($table_col_widht, 5, " _ _ _ _ ", 0, 1, 'C');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);
        $table_col_widht = $page_width / 3;

        $pdf->Cell($page_width, 5, 'اذن صرف', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
        $pdf->Cell($table_col_widht, 5, 'التاريخ', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, "   ", 0, 1, 'C');
        $pdf->Cell($table_col_widht, 5, $deduct->created_at->format('Y-m-d'), 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, "", 0, 1, 'C');
        $pdf->setFillColor(200, 200, 200);
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht, 5, 'الرقم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الصنف ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الكميه ', 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;
        foreach ($deduct->items as $item) {
            $pdf->Cell($table_col_widht, 5, $index, 1, 0, 'C');
            $pdf->Cell($table_col_widht, 5, $item->name, 1, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, $item->pivot->quantity, 1, 1, 'C');
            $index++;
        }
        $pdf->Ln();
        $pdf->Cell($table_col_widht, 5, 'توقيع المستلم', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, "مدير المخزن  ", 0, 1, 'C');
        $pdf->Cell($table_col_widht, 5, ' _ _ _ _ ', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, ' ', 0, 0, 'C');
        $pdf->Cell($table_col_widht, 5, " _ _ _ _ ", 0, 1, 'C');
        $pdf->Output('example_003.pdf', 'I');

    }

    public function labreport(Request $request)
    {


        $shift = Shift::latest()->first();

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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;

        $pdf->Cell($page_width, 5, 'ورديه المعمل', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 2;
        $pdf->Cell($table_col_widht, 5, 'التاريخ ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->created_at->format('Y/m/d'), 1, 1, 'C');

        $table_col_widht = ($page_width - 20) / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht / 2, 5, 'الرقم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht + 20, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'القيمه ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'المدفوع ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht / 2, 5, " التخفيض", 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht / 2, 5, "بنكك", 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht / 2, 5, "الشركه", 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht * 2, 5, "  الفحوصات", 1, 1, 'C', fill: 1);

        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $index = 1;
        /** @var Patient $patient */
        foreach ($shift->patients as $patient) {
            $y = $pdf->GetY();
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht / 2, 5, $patient->visit_number, 0, 0, 'C');
            $pdf->Cell($table_col_widht + 20, 5, $patient->name, 0, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, number_format($patient->total(), 1), 0, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht, 5, number_format($patient->paid_lab(), 1), 0, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht / 2, 5, $patient->discountAmount(), 0, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht / 2, 5, $patient->bankak(), 0, 0, 'C', stretch: 1);
            $pdf->Cell($table_col_widht / 2, 5, $patient?->company->name ?? 'cash', 0, 0, 'C', stretch: 1);
            $pdf->MultiCell($table_col_widht * 2, 5, $patient->tests_concatinated(), 0, 'L', false, stretch: 1);
            $pdf->Line(PDF_MARGIN_LEFT, $y, PDF_MARGIN_RIGHT, $y);

            $index++;
        }
        $pdf->Ln();
        $table_col_widht = ($page_width) / 5;

        $pdf->Cell($table_col_widht, 5, 'الاجمالي', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, '  المدفوع', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'التخفيض ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'بنكك ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, " النقدي", 1, 1, 'C', fill: 1);

        $pdf->Cell($table_col_widht, 5, number_format($shift->totalLab(), 1), 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->paidLab(), 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->totalLabDiscount(), 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->bankakLab(), 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->paidLab() - $shift->bankakLab(), 1, 1, 'C', fill: 1);

        $pdf->Output('example_003.pdf', 'I');

    }
    public function sellReport(Request $request)
    {


        $shift = Shift::find($request->query('shift_id'));

        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
//        $lg['a_meta_charset'] = 'UTF-8';
//        $lg['a_meta_dir'] = 'rtl';
//        $lg['a_meta_language'] = 'fa';
//        $lg['w_page'] = 'page';
//        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('Sales Report');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;

        $pdf->Cell($page_width, 5, ' Sales report', 0, 1, 'C');
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($page_width, 5, ' No  '.$shift->id, 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 4;
        $pdf->Cell($table_col_widht, 5, 'Date ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->created_at->format('Y/m/d'), 1, 1, 'C');
        $pdf->Cell($table_col_widht, 5, 'Time ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->created_at->format('H:i A'), 1, 1, 'C');

        $table_col_widht = ($page_width ) / 5;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht , 5, 'Id', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'Total', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht /2, 5, 'Type', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht /2 , 5, "Time", 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht * 2 , 5, 'Items', 1, 1, 'C', fill: 1);


        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();
        $arr = array('LR' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $index = 1;
        /** @var Deduct $deduct */
        foreach ($shift->deducts as $deduct) {
            $y = $pdf->GetY();
            if (!$deduct->complete) continue;
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht , 5, $deduct->id, $arr, 0, 'C');
            $pdf->Cell($table_col_widht , 5, intval($deduct->total_price() * 1e1) / 1e1, $arr, 0, 'C');
            $pdf->Cell($table_col_widht/2 , 5, $deduct->paymentType->name, $arr, 0, 'C');
            $pdf->Cell($table_col_widht/2 , 5, $deduct->created_at->format('H:i A'), $arr, 0, 'C');
            $pdf->MultiCell($table_col_widht *2 , 5, $deduct->items_concatinated(), $arr, 0, ln: 1);


            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $index++;
        }
        $pdf->Ln();
        $pdf->Ln();

        $table_col_widht = ($page_width) / 5;
        $pdf->Cell($table_col_widht , 5, 'Total income', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, intval($shift->totalDeductsPrice() * 1e1) / 1e1, 1, 1, 'C', fill: 0);
        $pdf->Cell($table_col_widht , 5, 'Bank', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5,intval($shift->totalDeductsPriceBank() * 1e1) / 1e1, 1, 1, 'C', fill: 0);
        $pdf->Cell($table_col_widht , 5, 'Transfer', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, intval($shift->totalDeductsPriceTransfer() * 1e1) / 1e1, 1, 1, 'C', fill: 0);
        $pdf->Cell($table_col_widht , 5, 'Cash', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5,intval($shift->totalDeductsPriceCash() * 1e1) / 1e1 , 1, 1, 'C', fill: 0);




        $pdf->Output('example_003.pdf', 'I');

    }
    public function searchDeductByDate(Request $request)
    {



        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('Sales Report');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;

        $pdf->Cell($page_width, 5, ' Sales report', 0, 1, 'C');
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
        $first = $request->query('first');
        $second = $request->query('second');
        $first = \Illuminate\Support\Carbon::createFromFormat('Y/m/d', $first)->startOfDay();
        $second = Carbon::createFromFormat('Y/m/d', $second)->endOfDay();
        $deducts =  Deduct::whereBetween('created_at',[$first,$second])->get();

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 4;
        $pdf->Cell($table_col_widht, 5, 'From ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $first ,1, 1, 'C');

        $pdf->Cell($table_col_widht, 5, 'To ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $second, 1, 1, 'C');


        $table_col_widht = ($page_width ) / 5;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht , 5, 'Date', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'Price', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, 'User', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, 'Payment', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht  , 5, "Items", 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();
        $arr = array('LR' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $index = 1;
        $total = 0;
        /** @var Deduct $deduct */
        foreach ($deducts as $deduct) {
            $y = $pdf->GetY();
            $total+= $deduct->total_price();
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht , 5, $deduct->created_at->format('Y/m/d'), $arr, 0, 'C');
            $pdf->Cell($table_col_widht , 5,intval($deduct->total_price() * 1e1) / 1e1 , $arr, 0, 'C');
            $pdf->Cell($table_col_widht , 5, $deduct->user->username, $arr, 0, 'C');
            $pdf->Cell($table_col_widht , 5, $deduct->paymentType->name, $arr, 0, 'C');

            $pdf->MultiCell($table_col_widht *2 , 5, $deduct->items_concatinated(), $arr, 0, ln: 1);
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $index++;
        }
        $pdf->Ln();
        $pdf->Ln();

        $table_col_widht = ($page_width) / 4;
        $pdf->Cell($table_col_widht , 5, 'Total income', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, intval($total * 1e1) / 1e1 , 1, 1, 'C', fill: 0);





        $pdf->Output('example_003.pdf', 'I');

    }
    public function expiredItems(Request $request)
    {



        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('Expired');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;

        $pdf->Cell($page_width, 5, 'Expired Items', 0, 1, 'C');
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
        $first = $request->query('first');
        $second = $request->query('second');

        $pdf->setFillColor(200, 200, 200);

        $table_col_widht = ($page_width ) / 4;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);

        $pdf->Cell($table_col_widht , 5, 'Name', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'Expire date', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, 'Amount left (Box)', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht , 5, 'Box price', 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();
        $arr = array('LR' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $index = 1;
        $total = 0;
        $items = Item::all();
        /** @var Item $item */
        foreach ($items as $item) {
            $y = $pdf->GetY();
            if (   ! Carbon::parse($item->expire)->lte(Carbon::now()))continue;

            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(strips) as total'))->where('item_id', $item->id)->value('total');
            $box_quantity_deducted = $total_deduct / $item->strips;

            $remaining = $total_deposit - $box_quantity_deducted;
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht , 5, $item->market_name, $arr, 0, 'C',stretch: 1);
            $pdf->Cell($table_col_widht , 5, $item->expire, $arr, 0, 'C');
            $pdf->Cell($table_col_widht , 5, $box_quantity_deducted, $arr, 0, 'C');
            $pdf->Cell($table_col_widht , 5, $item->sell_price, $arr, 1, 'C');

            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $index++;
        }
        $pdf->Ln();
        $pdf->Ln();






        $pdf->Output('example_003.pdf', 'I');

    }

    public function result(Request $request)
    {
        /** @var Patient $patient */
        $patient = Patient::find($request->get('pid'));
        if ($patient->result_print_date == null) {
            $patient->update(['result_print_date' => now()]);

        }
        $pdf = new Pdf('portrait', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('alryyan mahjoob');
        $pdf->setTitle('النتيحه');
        $pdf->setSubject('patient lab result');
        $pdf->setMargins(PDF_MARGIN_LEFT, 85, PDF_MARGIN_RIGHT);

        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(0);
        $pdf->setAutoPageBreak(TRUE, 0);
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        /** @var Setting $img_base64_encoded */
        $settings= Setting::all()->first();
        $img_base64_encoded =  $settings->header_base64;
        $img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));

//        $pdf->writeHTML($img, true, false, true, false, '');
        $pdf->head = function ($pdf) use ($patient, $page_width, $arial,$settings) {
            $pdf->SetFont($arial, '', 18, '', true);


            $pdf->Ln(20);
            $pdf->Cell($page_width,5,$settings->is_logo ? $settings->lab_name :'',0,1,'C');


            $pdf->Ln(20);

            $y = $pdf->GetY();
            $pdf->SetFont($arial, '', 13, '', true);
            $table_col_widht = ($page_width) / 4;
            $pdf->cell($table_col_widht / 2, 5, "Date", 0, 0, 'C');
            $pdf->cell($table_col_widht, 5, $patient->created_at->format('Y-m-d'), 0, 0, 'C');
            $pdf->SetFont($arial, '', 18, '', true);
            $pdf->cell($table_col_widht * 2 + 10, 5, $patient->name, 0, 0, 'R'); //patient name
            $pdf->cell($table_col_widht / 2 - 10, 5, "الاسم/ ", 0, 1, 'R'); //

            $pdf->cell($table_col_widht / 2, 5, "SN", 0, 0, 'C');
            $pdf->cell($table_col_widht, 5, $patient->id, 0, 0, 'C'); //age
            $pdf->SetFont($arial, '', 15, '', true);

            $pdf->cell($table_col_widht * 2 + 10, 5, $patient?->doctor?->name, 0, 0, 'R'); // doctor name
            $pdf->cell($table_col_widht / 2 - 10, 5, "د/ ", 0, 1, 'C');
            $requestedTests = $patient->tests_concatinated();
            if ($pdf->PageNo() == 1) {
                $pdf->Line(6, 5, 205, 5); //TOP LINE [H]
//            $pdf->Line(6, 35, 205, 35); //SECOND [H]
                $pdf->Line(6, 70, 205, 70); //SECOND [H]
                $pdf->Line(6, 80, 205, 80); //SECOND [H]
                $pdf->RoundedRect(6, 50, 199, 18, 6.50, '0101');


//            $pdf->Line(6, 68, 205, 68); //THIRD [H]
                $pdf->Line(6, 70, 6, 280); //line between 2 points
                $pdf->Line(205, 70, 205, 280); //line between 2 points
                $pdf->SetFont($arial, '', 10, '', true);
                // $pdf->cell(25, 5, "", 0, 1, 'L');
                $pdf->SetFont($arial, '', 9, '', true);
                $pdf->Ln();
                $pdf->cell(25, 5, "Requested: ", 0, 0, 'L');
                $pdf->MultiCell(170, 5, "$requestedTests", 0, 'L', 0, 1, '', '', true);
                $pdf->SetFont($arial, '', 15, '', true);

//            $pdf->Ln(50);
            } else {
                $pdf->Line(6, 43, 6, 280); //line between 2 points

                $pdf->Line(205, 43, 205, 280); //line between 2 points
            }
        };
        $pdf->foot = function ($pdf) use ($patient, $page_width, $arial,$settings) {
            if ($settings->footer_content != null){
              $pdf->MultiCell($page_width, 5, $settings->footer_content, 0, 'C', 0, 1, '', '', true);

            }
        };
            $pdf->AddPage();
        //$pdf->Ln(25);
        $pdf->SetFillColor(240, 240, 240);
        $page_height = $pdf->getPageHeight() - PDF_MARGIN_TOP;
        $pdf->SetFont('aealarabiya', '', 10, '', true);
        $mypakages = Package::all();
        $img_base64_encoded =  $settings->header_base64;
        $header_img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));

        $img_base64_encoded =  $settings->footer_base64;
        $footer_img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        if ($settings->is_logo ){
            $pdf->Image("@".$img, 5, 5, 40, 40);

        }
        if (!$request->has('base64')) {

            if ($settings->is_header) {
                $pdf->Image("@" . $header_img, 10, 10, $page_width + 10, 30);

            }
            if ($settings->is_footer) {
                $pdf->Image("@" . $footer_img, 10, 270, $page_width + 10, 20);

            }
        }
        foreach ($mypakages as $package) {
            $show_headers = true;
            $main_test_array = $patient->labrequests->filter(function ($item) use ($package) {
                return $item->mainTest->pack_id == $package->package_id;
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
                    $number_of_lines_in_normal_range = substr_count($nr, "\n");
                    $lines_in_result = substr_count($requested_result->result, "\n");
                    $total_lines += max($lines_in_result, $number_of_lines_in_normal_range);
                }
                $number_of_lines_in_normal_range = $number_of_lines_in_normal_range / 2;
                $number_of_lines_in_normal_range = $total_lines * 5;
                $requared_height = ($children_count * 5) + $number_of_lines_in_normal_range;
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

                    $table_col_widht = ($page_width) / 4;

                    if ($show_headers) {

                        $pdf->cell($table_col_widht, 5, "Test", 1, 0, 'C', 1);
                        $pdf->cell($table_col_widht * 1.5, 5, "Result", 1, 0, 'C', 1);
                        $pdf->cell($table_col_widht / 2, 5, "Unit", 1, 0, 'C', 1);
                        $pdf->cell($table_col_widht, 5, "R.Values", 1, 1, 'C', 1);
                    }


                    $show_headers = false;
                }
                if ($has_more_than1_child) //only show main test name if has more than 1 child test
                {
                    $table_col_widht = ($page_width) / 4;

                    $pdf->SetFont($arial, 'u', 17, '', true);
                    $pdf->cell(40, 5, $m_test->mainTest->main_test_name, 0, 1, 'L'); // main
                    $pdf->Ln();

                    $pdf->SetFont($arial, '', 11, '', true);
                    $y = $pdf->GetY();

                    $pdf->cell($table_col_widht, 5, "Test", 1, 0, 'C', 1);
                    $pdf->cell($table_col_widht * 1.5, 5, "Result", 1, 0, 'C', 1);
                    $pdf->cell($table_col_widht / 2, 5, "Unit", 1, 0, 'C', 1);
                    $pdf->cell($table_col_widht, 5, "R.Values", 1, 1, 'C', 1);
                    $pdf->Ln();

                }
                $old = '';

                /** @var RequestedResult $result */
                foreach ($m_test->requested_results as $result) {
                    $child_test = $result->childTest;
                    if ($child_test == null) continue;
                    $y = $pdf->GetY();
                    if ($result->childTest->childGroup?->name != null) {
                        $new = $result->childTest->childGroup?->name;
                        if ($old != $new) {
                            $old = $result->childTest->childGroup?->name;
                            $pdf->SetFont($arial, 'u', 14, '', true);

                            $pdf->cell(40, 5, $old, 0, 1);
                            $pdf->SetFont($arial, '', 12, '', true);


                        }

                        if ($old != '') {
                            if ($old != $new) {
                            }

                        }

                    }
                    $unit = $child_test?->unit?->name;
                    $normal_range = $result->normal_range;
                    $child_id = $child_test->id;
                    $table_col_widht = ($page_width) / 4;
                    $resultCellHeight = 5;
                    $pdf->cell($table_col_widht, 5, $child_test->child_test_name, 0, 0, 'C'); // test name
                    $report_result = $result->result;
                    $pdf->SetFont('dejavusans', 'b', 11, '', true);

                    if (($child_id == 46 || $child_id == 70 || $child_id == 213) && $report_result != '' && is_numeric($report_result)) {
                        $percent = ($report_result / 15) * 100;
                        $percent = ceil($percent);

                        $resultCellHeight = $pdf->MultiCell($table_col_widht * 1.5, 5, "$report_result         $percent % ", 0, 'C', 0, 0, '', '', true);
                    } else {
                        $lines_in_result = $pdf->getNumLines($report_result);
//                                echo $lines_in_result;
                        if ($lines_in_result > 0) {

                            $resultCellHeight = $pdf->MultiCell($table_col_widht * 1.5, 5, "$report_result", 0, 'C', 0, 0, '', '', true);


                        } else {
                            $resultCellHeight = $pdf->MultiCell($table_col_widht * 1.5, 5, "$report_result", 0, 'C', 0, 0, '', '', true);

                        }


                    }
                    $pdf->SetFont($arial, '', 8, '', true);
                    $pdf->MultiCell($table_col_widht / 2, 5, "$unit", 0, 'C', 0, 0, '', '', true);
//                        $pdf->cell($table_col_widht/2, 5, "$unit", 0, 0, 'C', 0, '', 1); // unit
                    $normalRangeCellHeight = $pdf->MultiCell($table_col_widht, 5, "$normal_range", 0, 'C', 0, 1, '', '', true);
                    $y = $pdf->GetY();
                    $x = $pdf->GetX();
                    $highestValue = max([$normalRangeCellHeight, $resultCellHeight]);

                    if ($resultCellHeight > $normalRangeCellHeight) {
                        //caclulate additional height
                        $additional_height = $resultCellHeight * 5 - ($normalRangeCellHeight * 5);
                        $pdf->Line(PDF_MARGIN_LEFT, $y + $additional_height, $page_width + PDF_MARGIN_RIGHT, $y + $additional_height);

                    } else {
                        $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

                    }


                }


                if ($lines_in_result > 0) {

                    $y = $pdf->GetY();
                    $pdf->setY($y + $resultCellHeight * 5);
                    if (str_word_count($m_test->comment) > 0) {
                        $pdf->Ln();
                        $pdf->SetFont($arial, 'u', 14, '', true);

                        $pdf->cell(20, 5, "Comment", 0, 1, 'C'); // bcforh
                        $pdf->Ln();

                        $y = $pdf->GetY();
                        $pdf->SetFont($arial, 'b', 12, '', true);

                        $pdf->MultiCell($page_width, 5, "♠ " . $m_test->comment, 0, "", 0);
                        $pdf->SetFont($arial, '', 12, '', true);

                        $pdf->Ln();

                    }

                } else {
                    if (str_word_count($m_test->comment) > 0) {
                        $pdf->Ln();
                        $pdf->SetFont($arial, 'u', 14, '', true);

                        $pdf->cell(20, 5, "Comment", 0, 1, 'C'); // bcforh
                        $pdf->Ln();

                        $y = $pdf->GetY();
                        $pdf->SetFont($arial, 'b', 12, '', true);

                        $pdf->MultiCell($page_width, 5, "♠ " . $m_test->comment, 0, "", 0);
                        $pdf->SetFont($arial, '', 12, '', true);

                        $pdf->Ln();

                    }
                }

            }
        }
        if ($request->has('base64')) {
            $result_as_bs64 = $pdf->output('name.pdf', 'E');
            return $result_as_bs64;

        } else {
            $pdf->output();

        }

    }
    public function printLab(Request $request)
    {
        /** @var Patient $patient */
        $patient = Patient::find($request->get('pid'));
        $custom_layout = array(80, 100);
        $settings= Setting::all()->first();

        $pdf = new Pdf('portrait', PDF_UNIT, $custom_layout, true, 'UTF-8', false);

        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('alryyan mahjoob');
        $pdf->setTitle('ايصال المختبر');
        $pdf->setSubject('ايصال المختبر');
        $pdf->setMargins(0, 0, 0);
//        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//        $pdf->setFooterMargin(0);
        $page_width = 70;
//        echo  $pdf->getPageWidth();
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->AddPage();
        $pdf->setAutoPageBreak(TRUE, 0);
        $pdf->setMargins(5, 5, 5);

        //$pdf->Ln(25);
        $pdf->SetFillColor(240, 240, 240);

        $pdf->SetFont($arial, 'u', 10, '', true);
        $pdf->Ln();
        $pdf->Cell($page_width,5,$settings->hospital_name,0,1,'C');
        $pdf->SetFont($arial, '', 10, '', true);

        $pdf->Ln();

        $pdf->Cell(20,5,'اسم المريض',0,0);
        $pdf->Cell(60,5,$patient->name,0,1);
        $pdf->Cell(20,5,'اسم الطبيب',0,0);

        $pdf->Cell(60,5,$patient?->doctor?->name,0,1);
        $pdf->Ln();
        $pdf->Cell(15,5,'التاريخ',0,0);

        $pdf->Cell(60,5,$patient->created_at->format('Y/m/d H:i A'),0,1);
        $pdf->Cell($page_width,5,'Lab No  '.$patient->visit_number,1,1,'C');
        $pdf->Ln();
        $pdf->SetFont($arial, 'u', 10, '', true);

        $pdf->Cell(25,5,'التحاليل المطلوبه',0,1,'R');

        $pdf->SetFont($arial, '', 8, '', true);

        $pdf->MultiCell($page_width,5,$patient->tests_concatinated(),0,'j',false,1);
        $pdf->Ln();
        $style = array(
            'position' => 'C',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );


        $pdf->Cell(15,5,'الاجمالي',1,0,fill: 1);
        $pdf->Cell(30,5,number_format($patient->total(),1) ,1,1);

        $pdf->Cell(15,5,'المدفوع',1,0,fill: 1);
        $pdf->Cell(30,5,number_format($patient->paid_lab(),1),1,1);
        $pdf->Ln();
        $pdf->write1DBarcode("$patient->id", 'C128', '', '', '40', 18, 0.4, $style, 'N');

        if ($request->has('base64')) {
            $result_as_bs64 = $pdf->output('name.pdf', 'E');
            return $result_as_bs64;

        } else {
            $pdf->output();

        }

    }
    public function printReception(Request $request)
    {
        $patient = Doctorvisit::find($request->get('doctor_visit'));
//        return $patient;
        $count =  $patient->services->count();
        $custom_layout = array(80, 110 + $count * 5);
        $settings= Setting::all()->first();

        $pdf = new Pdf('portrait', PDF_UNIT, $custom_layout, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $lg = array();
        $pdf->SetFillColor(240, 240, 240);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('alryyan mahjoob');
        $pdf->setTitle('ticket');
        $pdf->setSubject('ticket');
        $pdf->setMargins(0, 0, 0);
        $page_width = 70;
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->AddPage();
        /** @var Setting $img_base64_encoded */
        $settings= Setting::all()->first();
        $img_base64_encoded =  $settings->header_base64;
        $img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        if ($settings->is_logo ){
            $pdf->Image("@".$img, $page_width / 2 - 5, 5, 20, 20,align: 'C');

        }
        $pdf->Ln();
        $pdf->SetFont($arial, '', 10, '', true);

        $pdf->Cell($page_width,5,$settings->hospital_name,0,1,'C');

        $pdf->Ln();

        $pdf->Cell(20,5,'اسم المريض',1,0,fill: 1);
        $pdf->Cell(60,5,$patient->patient->name,1,1);
        $pdf->Cell(20,5,'اسم الطبيب',1,0,fill: 1);
        $pdf->SetFont($arial, '', 8, '', true);

        $pdf->Cell(60,5,$patient->doctorShift->doctor->name,1,1);
        $pdf->Ln();
        $colWidth  = $page_width /4;
        $pdf->Cell($colWidth,5,'التاريخ',1,0,fill: 1,align: 'C');

        $pdf->Cell($colWidth,5,$patient->created_at->format('Y/m/d         H:i A'),0,1);
        $pdf->Cell($colWidth,5,'كود',1,0,'C',fill: 1);
        $pdf->Cell($colWidth,5,$patient->id,0,1,'C');
        $pdf->Ln();
        $pdf->setAutoPageBreak(TRUE, 0);
        $pdf->setMargins(5, 5, 5);
        //$pdf->Ln(25);
        $pdf->Ln();
        $pdf->Cell(25,5,'الخدمات المطلوبه',0,1,'L');

        $pdf->SetFont($arial, '', 8, '', true);
        $colWidth = $page_width/4;
        $pdf->Cell($colWidth * 2,5,'الاسم',1,0,fill: 1);
        $pdf->Cell($colWidth/ 2,5,'السعر',1,0,fill: 1);
        $pdf->Cell($colWidth/ 2,5,'العدد',1,0,fill: 1);
        $pdf->Cell($colWidth,5,'اجمالي',1,1,fill: 1);
        $total = 0;
        foreach ($patient->services as $requestedService){
            $pdf->Cell($colWidth * 2,5,$requestedService->service->name,1,0,stretch: 1);
            $pdf->Cell($colWidth/2,5,$requestedService->price,1,0);
            $pdf->Cell($colWidth/2,5,$requestedService->count,1,0);
            $pdf->Cell($colWidth,5,$requestedService->count * $requestedService->price,1,1);
            $total+= $requestedService->count * $requestedService->price;
        }

        $pdf->Ln();
        $style = array(
            'position' => 'C',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );




        $pdf->Ln();
        $pdf->write1DBarcode("$patient->id", 'C128', '', '', '40', 18, 0.4, $style, 'N');
        $pdf->Ln();
        $pdf->Cell(15,5,'الاجمالي',1,0,fill: 1);

        $pdf->Cell(30,5,number_format($total,1) ,1,1);

        $pdf->Cell(15,5,'المستخدم',1,0,fill: 1);
        $pdf->Cell(15,5,auth()->user()->username,1,0,fill: 0);

        $pdf->Ln();

        if ($request->has('base64')) {
            $result_as_bs64 = $pdf->output('name.pdf', 'E');
            return $result_as_bs64;

        } else {
            $pdf->output();

        }

    }
    public function printSale(Request $request)
    {
        /** @var Deduct $deduct */
        $deduct = Deduct::find($request->get('deduct_id'));
        $count =  $deduct->deductedItems->count();
        $custom_layout = array(80, 110 + $count * 5);
        $settings= Setting::all()->first();

        $pdf = new Pdf('portrait', PDF_UNIT, $custom_layout, true, 'UTF-8', false);

        $lg = array();

        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('alryyan mahjoob');
        $pdf->setTitle('ticket');
        $pdf->setSubject('ticket');
        $pdf->setMargins(0, 0, 0);
//        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//        $pdf->setFooterMargin(0);
        $page_width = 70;
//        echo  $pdf->getPageWidth();
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->AddPage();
        /** @var Setting $img_base64_encoded */
        $settings= Setting::all()->first();
        $img_base64_encoded =  $settings->header_base64;
        $img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        if ($settings->is_logo ){
            $pdf->Image("@".$img, $page_width / 2 - 5, 5, 20, 20,align: 'C');

        }

        $pdf->setAutoPageBreak(TRUE, 0);
        $pdf->setMargins(5, 5, 5);

        //$pdf->Ln(25);
        $pdf->SetFillColor(240, 240, 240);

        $pdf->SetFont($arial, 'u', 10, '', true);
        $pdf->Ln(15);
        $pdf->Cell($page_width,5,$settings->hospital_name,0,1,'C');
        $pdf->SetFont($arial, '', 10, '', true);

        $pdf->Ln();

        $pdf->Cell(20,5,'Sale No',0,0);
        $pdf->Cell(60,5,$deduct->id,0,1);
//        $pdf->Ln();
        $pdf->Cell(15,5,'Date',0,0);

        $pdf->Cell(60,5,$deduct->created_at->format('Y/m/d H:i A'),0,1);
        $pdf->Ln();
        $pdf->SetFont($arial, 'u', 10, '', true);

        $pdf->Cell(25,5,'Requested Items',0,1,'L');

        $pdf->SetFont($arial, '', 8, '', true);
        $colWidth = $page_width/4;
        $pdf->Cell($colWidth,5,'Name',1,0,fill: 1);
        $pdf->Cell($colWidth,5,'Price',1,0,fill: 1);
        $pdf->Cell($colWidth,5,'Unit',1,0,fill: 1);
        $pdf->Cell($colWidth,5,'Subtotal',1,1,fill: 1);
        /** @var DeductedItem $deductedItem */
        foreach ($deduct->deductedItems as $deductedItem){
            $pdf->Cell($colWidth,5,$deductedItem->item->market_name,1,0);
            $pdf->Cell($colWidth,5,$deductedItem->item->sell_price,1,0);
            $pdf->Cell($colWidth,5,$deductedItem->box,1,0);
            $pdf->Cell($colWidth,5,$deductedItem->box * $deductedItem->item->sell_price,1,1);
        }

        $pdf->Ln();
        $style = array(
            'position' => 'C',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );




        $pdf->Ln();
        $pdf->write1DBarcode("$deduct->id", 'C128', '', '', '40', 18, 0.4, $style, 'N');
        $pdf->Ln();
        $pdf->Cell(15,5,'Total',1,0,fill: 1);

        $pdf->Cell(30,5,number_format($deduct->total_price(),1) ,1,1);
        $pdf->Ln();

        $pdf->Cell(15,5,'User',1,0,fill: 1);
        $pdf->Cell(15,5,$deduct->user->username,1,0,fill: 0);

        $pdf->Ln();

        if ($request->has('base64')) {
            $result_as_bs64 = $pdf->output('name.pdf', 'E');
            return $result_as_bs64;

        } else {
            $pdf->output();

        }

    }

    public function clinicsReport(Request $request)
    {


        $shift = Shift::latest()->first();
        $user_id = $request->get('user');
        $doctor_shifts = DoctorShift::with(['doctor', 'visits'])->where('user_id', $user_id)->where('status', 1)->where('shift_id', $shift->id)->get();


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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, 'العيادات', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 6;
        $pdf->Cell($table_col_widht, 5, 'التاريخ ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $shift->created_at->format('Y/m/d'), 1, 1, 'C');

        $table_col_widht = ($page_width - 20) / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        /** @var DoctorShift $doctor_shift */
        $doc_count = 0;
        foreach ($doctor_shifts as $doctor_shift) {
            $doc_count++;
            if ($pdf->getPage() == 1) {
                if ($doc_count == 2) {
                    $pdf->AddPage();
                }
            } else {
                $pdf->AddPage();

            }
            $table_col_widht = ($page_width) / 6;

            $pdf->Cell($table_col_widht, 5, 'الطبيب', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, $doctor_shift->doctor->name, 1, 0, 'C', fill: 0, stretch: 1);
            $pdf->Cell($table_col_widht, 5, '', 0, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, '', 0, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, 'زمن فتح العياده', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, $doctor_shift->created_at->format('h:i:s'), 1, 1, 'C', fill: 0);
            $pdf->Ln();
            $pdf->Cell('30', 5, 'المرضي', 1, 1, 'C', fill: 0);
            $pdf->Ln();
            $table_col_widht = ($page_width) / 6;

            $pdf->Cell($table_col_widht, 5, 'الكود', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, 'اسم', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, 'المدفوع', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, 'نصيب الطبيب', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, 'نصيب المركز', 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, 'الخدمات', 1, 1, 'C', fill: 1);
            $pdf->Ln();
            $pdf->setFont($fontname, 'b', 12);
            $total_hospital = 0;
            $total_doctor = 0;
            $total_paid = 0;

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctor_shift->visits as $doctorvisit) {
                $y = $pdf->GetY();

                $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
                $pdf->Cell($table_col_widht, 5, $doctorvisit->patient->id, 0, 0, 'C', fill: 0);
                $pdf->Cell($table_col_widht, 5, $doctorvisit->patient->name, 0, 0, 'C', fill: 0);
                $pdf->Cell($table_col_widht, 5, number_format($doctorvisit->total_paid_services(), 1), 0, 0, 'C', fill: 0);
                $total_paid += $doctorvisit->total_paid_services();
                $pdf->Cell($table_col_widht, 5, number_format($doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit), 1), 0, 0, 'C', fill: 0);
                $total_doctor += $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit);
                $pdf->Cell($table_col_widht, 5, number_format($doctorvisit->total_paid_services() - $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit), 1), 0, 0, 'C', fill: 0);
                $total_hospital += $doctorvisit->total_paid_services() - $doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit);
                $pdf->MultiCell($table_col_widht, 5, $doctorvisit->services_concatinated(), 0, 'R', false, stretch: 1);
                $y = $pdf->GetY();

                $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);


            }
            $pdf->Ln();
            $pdf->Ln();
            $table_col_widht = ($page_width) / 6;

            $pdf->Cell($table_col_widht, 5, '', 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, '', 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, number_format($total_paid, 1), 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, number_format($total_doctor, 1), 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, number_format($total_hospital, 1), 1, 0, 'C', fill: 1);
            $pdf->Cell($table_col_widht, 5, '', 1, 1, 'C', fill: 0);

        }


        $pdf->Output('example_003.pdf', 'I');

    }

    public function allclinicsReport(Request $request)
    {


        $shift = Shift::find($request->get('shift'));
        if ($request->has('user')){
            $user_id = $request->get('user');
            $doctor_shifts = DoctorShift::with(['doctor', 'visits'])->where('user_id', $user_id)->where('status', 1)->where('shift_id', $shift->id)->get();

        }else{
            $doctor_shifts = DoctorShift::with(['doctor', 'visits'])->where('shift_id', $shift->id)->get();
        }



        $pdf = new Pdf('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('التقرير العام');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, 'تقرير  العام', 0, 1, 'C');
        $pdf->setFont($fontname, 'b', 14);
        $table_col_widht = ($page_width) / 6;

        $pdf->Cell($table_col_widht, 5, "التاريخ", 0, 0, 'L');
        $pdf->Cell($table_col_widht, 5, "" . $shift->created_at->format('Y/m/d'), 0, 0, 'R');
        $pdf->Cell($table_col_widht * 2, 5, "رقم الورديه المالي " . $shift->id, 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = ($page_width) / 6;
        $pdf->Cell($table_col_widht, 5, 'العيادات ', 1, 1, 'C', fill: 1, stretch: true);

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        /** @var DoctorShift $doctor_shift */
        $doc_count = 0;
        $arr = array('LR' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

        $pdf->Cell($table_col_widht, 5, 'التخصص', $arr, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الطبيب', $arr, 0, 'C', fill: 1, stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'اجمالي المدفوع', $arr, 0, 'C', fill: 1, stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'نصيب الطبيب النقدي', $arr, 0, 'C', fill: 1, stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'نصيب الطيب من التامين', $arr, 0, 'C', fill: 1, stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'صافي ', $arr, 1, 'C', fill: 1, stretch: 1);
        $pdf->Ln();
        $total_total = 0;
        $total_doctor_cash = 0;
        $total_doctor_isnu = 0;
        $total_hosptal = 0;

        foreach ($doctor_shifts as $doctor_shift) {

            $y = $pdf->GetY();
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $pdf->Cell($table_col_widht, 5, $doctor_shift->doctor->specialist->name, 1, 0, 'C', fill: 1, stretch: true);
            $pdf->Cell($table_col_widht, 5, $doctor_shift->doctor->name, 0, 0, 'C', fill: 0, stretch: 1);
            $total = $doctor_shift->total();
            $total_total += $total;
            $pdf->Cell($table_col_widht, 5, number_format($total, 1), 0, 0, 'C', fill: 0, stretch: 1);
            $doctor_cash = $doctor_shift->doctor_credit_cash();
            $total_doctor_cash += $doctor_cash;
            $pdf->Cell($table_col_widht, 5, number_format($doctor_cash, 1), 0, 0, 'C', fill: 0, stretch: 1);
            $doctor_isnu = $doctor_shift->doctor_credit_company();
            $total_doctor_isnu += $doctor_isnu;
            $pdf->Cell($table_col_widht, 5, number_format($doctor_isnu, 1), 0, 0, 'C', fill: 0, stretch: 1);
            $hospital = $doctor_shift->hospital_credit();
            $total_hosptal += $hospital;
            $pdf->Cell($table_col_widht, 5, number_format($hospital, 1), 0, 0, 'C', fill: 0, stretch: 1);
            $pdf->Ln();
            $y = $pdf->GetY();

            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);


        }
        $pdf->Ln();

//        $pdf->Cell($table_col_widht, 5, '', 1, 0, 'C', fill: 1, stretch: true);
//        $pdf->Cell($table_col_widht, 5, '', 1, 0, 'C', fill: 0, stretch: 1);
//        $pdf->Cell($table_col_widht, 5, number_format($total_total, 1), 1, 0, 'C', fill: 0, stretch: 1);
//        $pdf->Cell($table_col_widht, 5, number_format($total_doctor_cash, 1), 1, 0, 'C', fill: 0, stretch: 1);
//        $pdf->Cell($table_col_widht, 5, number_format($total_doctor_isnu, 1), 1, 0, 'C', fill: 0, stretch: 1);
//        $pdf->Cell($table_col_widht, 5, number_format($total_hosptal, 1), 1, 1, 'C', fill: 0, stretch: 1);
        $pdf->Ln();
        $pdf->Cell($table_col_widht, 5, 'المصروفات ', 1, 1, 'C', fill: 1, stretch: true);
        $pdf->Ln();

        $pdf->Cell($table_col_widht, 5, 'وصف المنصرف', $arr, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'القيمه', $arr, 1, 'C', fill: 1, stretch: 1);
        /** @var Cost  $c */
        foreach ($shift->cost as $c){
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $pdf->Cell($table_col_widht, 5, $c->description, $arr, 0, 'C', fill: 1, stretch: true);
            $pdf->Cell($table_col_widht, 5, number_format($c->amount , 1), 1, 1, 'C', fill: 0, stretch: 1);
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

        }
        $pdf->Ln();
        $cost_total = $shift->cost->reduce(function ($pev,$curr){
            return $pev + $curr->amount;
        },0);
        $pdf->Ln();
        $pdf->Cell($table_col_widht, 5, 'الملخص ', 1, 1, 'C', fill: 1, stretch: true);
        $pdf->Ln();

        $pdf->Cell($table_col_widht, 5, 'اجمالي المختبر', 1, 0, 'C', fill: 1, stretch: true);
        $pdf->Cell($table_col_widht, 5, number_format($shift->paid_lab, 1), 1, 1, 'C', fill: 0, stretch: 1);

        $pdf->Cell($table_col_widht, 5, 'اجمالي العيادات', 1, 0, 'C', fill: 1, stretch: true);
        $pdf->Cell($table_col_widht, 5, number_format($total_total , 1), 1, 1, 'C', fill: 0, stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'اجمالي المنصرف', 1, 0, 'C', fill: 1, stretch: true);
        $pdf->Cell($table_col_widht, 5, number_format( $cost_total, 1), 1, 1, 'C', fill: 0, stretch: 1);
        $pdf->Cell($table_col_widht, 5, 'الصاقي', 1, 0, 'C', fill: 1, stretch: true);
        $pdf->Cell($table_col_widht, 5, ($total_total + $shift->paid_lab )-$cost_total  , 1, 0, 'C', fill: 1, stretch: true);


        $pdf->Output('example_003.pdf', 'I');

    }
    public function costReport(Request $request)
    {


        $shift_id = $request->query('shift_id');
        $shift = Shift::find($shift_id);
        $user_id = $request->get('user');
        $pdf = new Pdf('portrait', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('المصروفات');
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, 'تقرير  المصروفات', 0, 1, 'C');
        $pdf->setFont($fontname, 'b', 14);
        $table_col_widht = ($page_width) / 6;

        $pdf->Cell($table_col_widht, 5, "التاريخ", 0, 0, 'L');
        $pdf->Cell($table_col_widht, 5, "" . $shift->created_at->format('Y/m/d'), 0, 0, 'R');
        $pdf->Cell($table_col_widht * 2, 5, "رقم الورديه المالي " . $shift->id, 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = ($page_width) / 4;

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        $arr = array('LR' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $pdf->Ln();
        $pdf->Cell($table_col_widht, 5, 'المصروفات ', 1, 1, 'C', fill: 1, stretch: true);
        $pdf->Ln();

        $pdf->Cell($table_col_widht, 5, 'وصف المنصرف', $arr, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'المستخدم', $arr, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'التاريخ', $arr, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'القيمه', $arr, 1, 'C', fill: 1, stretch: 1);
        $y = $pdf->GetY();
        /** @var Cost  $c */
        foreach ($shift->cost as $c){
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $pdf->Cell($table_col_widht, 5, $c->description, $arr, 0, 'C', fill: 0, stretch: true);
            $pdf->Cell($table_col_widht, 5, $c->user->username, $arr, 0, 'C', fill: 0, stretch: true);
            $pdf->Cell($table_col_widht, 5, $c->created_at->format('Y/m/d H:i A'), $arr, 0, 'C', fill: 0, stretch: true);
            $pdf->Cell($table_col_widht, 5, number_format($c->amount , 1), $arr, 1, 'C', fill: 0, stretch: 1);
            $y = $pdf->GetY();

            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

        }
        $pdf->Ln();
        $cost_total = $shift->cost->reduce(function ($pev,$curr){
            return $pev + $curr->amount;
        },0);
        $pdf->Ln();
        $pdf->Cell($table_col_widht, 5, 'الملخص ', 1, 1, 'C', fill: 1, stretch: true);
        $pdf->Ln();

        $pdf->Cell($table_col_widht, 5, 'اجمالي المنصرف', 1, 0, 'C', fill: 1, stretch: true);
        $pdf->Cell($table_col_widht, 5, number_format( $cost_total, 1), 1, 1, 'C', fill: 0, stretch: 1);


        $pdf->Output('example_003.pdf', 'I');

    }

    public function clinicReport(Request $request)
    {


        $user_id = $request->get('user');
        $doctor_shift_id = $request->get('doctorshift');
        $doctorShift = DoctorShift::find($doctor_shift_id);


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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, 'التقرير الخاص', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 6;
        $pdf->Cell($table_col_widht, 5, 'التاريخ ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $doctorShift->created_at->format('Y/m/d'), 1, 1, 'C');

        $table_col_widht = ($page_width - 20) / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        $table_col_widht = ($page_width) / 6;

        $pdf->Cell($table_col_widht, 5, 'الطبيب', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $doctorShift->doctor->name, 1, 0, 'C', fill: 0, stretch: 1);
        $pdf->Cell($table_col_widht, 5, '', 0, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, '', 0, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'زمن فتح العياده', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, $doctorShift->created_at->format('h:i A'), 1, 1, 'C', fill: 0);
        $pdf->Ln();
        $pdf->Cell('30', 5, 'المرضي', 1, 1, 'C', fill: 0);
        $pdf->Ln();
        $table_col_widht = ($page_width) / 6;

        $pdf->Cell($table_col_widht, 5, 'الكود', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'اسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'المدفوع', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'نصيب الطبيب', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'نصيب المركز', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'الخدمات *', 1, 1, 'C', fill: 1);
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 12);

        /** @var Doctorvisit $doctorvisit */
        foreach ($doctorShift->visits as $doctorvisit) {
            $y = $pdf->GetY();
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $pdf->Cell($table_col_widht, 5, $doctorvisit->id, 0, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $doctorvisit->patient->name, 0, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, number_format($doctorvisit->total_paid_services($doctorShift->doctor), 1), 0, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, number_format($doctorvisit->doctorShift->doctor->doctor_credit($doctorvisit), 1), 0, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, number_format($doctorvisit->total_paid_services($doctorShift->doctor) - $doctorShift->doctor->doctor_credit($doctorvisit), 1), 0, 0, 'C', fill: 0);
            $pdf->MultiCell($table_col_widht, 5, $doctorvisit->services_concatinated(), 0, 'R', false, stretch: 1);
            $y = $pdf->GetY();

            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);




        }
        $pdf->Ln();

        $pdf->Cell($table_col_widht, 5, '', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, '', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, number_format($doctorShift->total(),1), 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, number_format($doctorShift->doctor_credit_company() + $doctorShift->doctor_credit_cash(),1), 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5,  number_format($doctorShift->hospital_credit(),1), 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, ' ', 1, 1, 'C', fill: 0);
        $pdf->Output('example_003.pdf', 'I');

    }

    public function companyTest(Request $request, Company $company)
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, $company->name, 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 2;

        $table_col_widht = ($page_width) / 6;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 14);
        $pdf->Ln();

        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $pdf->setEqualColumns(3, $page_width / 3);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $index = 1;
        $table_col_widht = ($page_width) / 6;

        /** @var MainTest $test */
        foreach ($company->tests as $test) {
            $y = $pdf->GetY();
//            dd($test);
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht, 5, $test->main_test_name, 0, 0, 'C', fill: true, stretch: true);
            $pdf->Cell($table_col_widht, 5, number_format($test->pivot->price, 1), 0, 1, 'C');
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $index++;
        }
        $pdf->Ln();

        $pdf->Output('example_003.pdf', 'I');

    }

    public function companyService(Request $request, Company $company)
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Cell($page_width, 5, $company->name, 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $table_col_widht = $page_width / 2;

        $table_col_widht = ($page_width) / 6;
        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, 'السعر ', 1, 1, 'C', fill: 1);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $pdf->setEqualColumns(3, $page_width / 3);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $index = 1;


        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;

        /** @var Service $service */
        foreach ($company->services as $service) {
            $y = $pdf->GetY();
//            dd($service);
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht, 5, $service->name, 0, 0, 'C', fill: true, stretch: true);
            $pdf->Cell($table_col_widht, 5, $service->pivot->price, 0, 1, 'C');

            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $index++;
        }
        $pdf->Ln();

        $pdf->Output('example_003.pdf', 'I');

    }

    public function shipping(Request $request, $phone = null, $wb = false)
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
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, 'b', 22);

        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);

        $pdf->setFillColor(200, 200, 200);
        $shippings = Shipping::all();
        $table_col_widht = ($page_width) / 9;
        $pdf->Cell($table_col_widht, 5, '  الاسم', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'رقم الهاتف ', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'الصنف ', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, '  اكسبرس', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'CTN', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'CBM', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'KG', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'التاريخ', 1, 0, 'C', fill: 0);
        $pdf->Cell($table_col_widht, 5, 'الحاله', 1, 1, 'C', fill: 0);
        $pdf->setFont($fontname, 'b', 12);
        $pdf->Ln();

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $index = 1;


        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 12);

        $index = 1;

        /** @var Shipping $shipping */
        foreach ($shippings as $shipping) {
            $y = $pdf->GetY();
//            dd($service);
            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);
            $pdf->Cell($table_col_widht, 5, $shipping->name, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->phone, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->item->name, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->express, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->ctn, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->cbm, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->kg, 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping->created_at->format('Y/m/d'), 1, 0, 'C', fill: 0);
            $pdf->Cell($table_col_widht, 5, $shipping?->state?->name ?? '', 1, 1, 'C', fill: 0);

            $pdf->Line(PDF_MARGIN_LEFT, $y, $page_width + PDF_MARGIN_RIGHT, $y);

            $index++;
        }
        $pdf->Ln();

        if ($wb) {
            $result_as_bs64 = $pdf->output('name.pdf', 'S');
            Whatsapp::sendPdf($result_as_bs64, $phone);
        } else {
            $pdf->Output('example_003.pdf', 'I');

        }


    }

}
