<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide :: All();
        $new_product = Product:: where('new',1)->paginate(8);
        
        $sanpham_khuyenmai = Product:: where('promotion_price','<>',0)->paginate(8);

        return view('product.trangchu', compact('slide','new_product','sanpham_khuyenmai'));
    }  

    public function getLoaisp($type){
        // hiện thị sp  theo loại
        $sp_theoloai = Product:: where ('id_type',$type)->paginate(8);
       //  hiện thị sp khác loại
        $loai_sp = ProductType::where('id',$type)->first();
        $loai = ProductType::all();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(8);
        return view('product.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }  

    public function getChitietsp(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sp_banchay = Product::where('promotion_price','=',0)->paginate(3);    
        $sp_new = Product::select('id','name','id_type','description','unit_price','promotion_price','image','unit','new','created_at','updated_at')->where('new','>',0)->orderBy('updated_at','ASC')->paginate( 3);
        return view('product.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }

    public function getAbout(){
        return view('product.about');
    }  
    public function getContact(){
        return view('product.contact');
    }  
   
    public function getIndexAdmin(){
        $products =Product::all();
        return view('admin.admin',compact('products'));
    }
    public function getAdminAdd(){
        return view('admin.addform');
    }
    
public function postAdminAdd(Request $request){
    $product = new Product();
    if($request->hasFile('image')){
        $file=$request->file('image');
        $fileName=$file->getClientOriginalName('image');
        $file->move('source/image/product', $fileName);
    }
        $file_name=null;
        if($request->file('image')!=null){
            $file_name = $request->file('image')->getClientOriginalName();
        }
        $product->name = $request->name;
        $product->image = $file_name;
        $product->description=$request->description;
        $product->unit_price =$request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->id_type = $request->type;
        $product->save();
        return $this->getIndexAdmin();
        
}
    public function getAdminEdit($id){
        $product = Product::find($id);
        return view('admin.editform',compact('product'));
    }



    public function postAdminEdit(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName('image');
            $file->move('source/image/product',$fileName);
        }
        if($request->file('image')!=null){
            $product->image = $fileName;
        }
        $product->name = $request->name;
        $product->id_type = $request->type;
       
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;

        $product->unit = $request->unit;
        $product->new = $request->new;
        
        $product->save();
        return $this->getIndexAdmin();
      
    }
    
    public function postAdminDelete($id){
        $product = Product::find($id);
        $product->delete();
        return $this->getIndexAdmin();

    }

}
