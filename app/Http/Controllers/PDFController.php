<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use PDF;

class PDFController extends Controller
{
    public function pdfGenerator(){
        $cvs = Cv::where('user_id', auth()->user()->id)->get();
        $pdf_view = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.pdf_convert',compact('cvs'));
        return $pdf_view->download('MyCV.pdf');
    }
}
