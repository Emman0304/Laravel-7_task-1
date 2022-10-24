<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


  
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
        $pdf = PDF::loadView('table');
  
        return $pdf->download('students.pdf');
    }
    public function display (){

        $fetch = DB::table('Products')->get();

        return view('table',compact('fetch'));
    }
}