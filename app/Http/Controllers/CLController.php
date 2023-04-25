<?php

namespace App\Http\Controllers;

use App\Models\Coverletter;
use Illuminate\Http\Request;

class CLController extends Controller
{
    //
    public function pdfGenerator(){
        $coverletters = Coverletter::where('user_id', auth()->user()->id)->get();
        $pdf_view = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.CL_convert',compact('coverletters'));
        return $pdf_view->download('MyCover_Letter.pdf');
    }
}
