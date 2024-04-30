<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Mypdf\Pdf;
use TCPDF_FONTS;


class PdfController extends Controller
{
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
            $pdf->Cell($table_col_widht,5, $item->name,1,0,'C');
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
