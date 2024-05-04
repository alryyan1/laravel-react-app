<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mypdf\Pdf;
use Illuminate\Support\Facades\DB;
use TCPDF_FONTS;


class PdfController extends Controller
{
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
            $pdf->Cell($table_col_widht,5,$item->initial_balance,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->initial_price,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,$item->initial_price * $item->initial_balance,1,0,'C',stretch: 1);
            $pdf->Cell($table_col_widht,5,  $total_deposit,1,0,'C');
            $pdf->Cell($table_col_widht,5,  $total_deduct,1,0,'C');
            $pdf->Cell($table_col_widht,5,  $item->remaining + $item->initial_balance,1,1,'C');
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
}
