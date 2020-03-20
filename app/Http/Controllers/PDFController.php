<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Post;
use Excel;
use App\Exports\UsersExport;

// use Users/gitamgadtaula/Desktop/internship-tasks/laravel/blog/app/Exports/UsersExport;

class PDFController extends Controller
{
        public function exportpdf() {
          $mydata= Post::all();
          $data=['title'=>'this is a message',
                  'mydata'=>$mydata];

          $pdf = PDF::loadView('report.pdf',$data);
          return $pdf->download('myblog.pdf');
        }

        public function exportxls(){
           return Excel::download(new UsersExport, 'mydata.xlsx');
        }
}
