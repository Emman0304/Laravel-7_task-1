<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
  
class PDFexportCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = ['title' => 'Goodluck Applicants'];
        $pdf = PDF::loadView('table', $data);
  
        return $pdf->download('students.pdf');
    }
}