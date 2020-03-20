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
          $show = Post::all();
          $data=['title'=>'this is a message'];
          $pdf = PDF::loadView('email.name',$data);
          return $pdf->download('myblogpdf.pdf');
        }

        public function exportxls(){
           return Excel::download(new UsersExport, 'mydata.xlsx');
        }
}
