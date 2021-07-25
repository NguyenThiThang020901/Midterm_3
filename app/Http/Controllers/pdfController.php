<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
class pdfController extends Controller
{
    public function index()
    {
        $products =Product::paginate(10);
        return view('pdf.products',compact('products'));
    }
 
    public function pdf(){
      
    
    $products =  Product::All();
    $pdf = PDF :: loadView('pdf.products',compact('products'));
    // $pdf =PDF::loadView('pdf.notes',compact('products') );
   
     return $pdf->download('products.pdf');
    }

    public function importForm(){
        return view('pdf.import-form');
    }

    public function import() 
    {
        Excel::import(new ProductsImport,request()->file('file'));
             
        return " Import Thành công";
    }

}
