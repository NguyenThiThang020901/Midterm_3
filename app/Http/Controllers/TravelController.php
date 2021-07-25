<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Http\Requests\TravelRequest;
class TravelController extends Controller
{
    
    // Hiện thị tour
    function show(){
        $travel =Travel::all();
        return view('travel.index',compact('travel'));  
    }
// Form tour mới 
    function formTravel(){
        return view('travel.form');
    }

    // Thêm tour mới
    function postTravel(Request $request){  
        $fileName='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'image'=>'required',
                'name'=>'required',
                'from_date'=>'required|date',
                'start_place'=>'required',
                'to_date'=>'required|date',
                'price'=>'required',
                'status'=>'required',
                'transport'=>'required',
                'type'=>'required',
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'name.required'=>'Bạn chưa nhập name',
                'start_place.required'=>'Bạn chưa nhập địa điểm',
                'from_date.required'=>'Bạn chưa nhập ngày đi',
                'from_date.date' => 'cột produced_on phải là kiểu ngày!',
                'to_date.required'=>'Bạn chưa nhập ngày về ',
                'to_date.date' => 'cột produced_on phải là kiểu ngày!',
                'price.required'=>'Bạn chưa bạn chưa nhập giá',
                'status.required'=>'Bạn chưa bạn chưa nhập status',
                'transport.required'=>'Bạn chưa bạn chưa nhập transport',
                'type.required'=>'Bạn chưa bạn chưa nhập type',
            ]);
            // $this->validate($request,[
            //     'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            //     'image'=>'required',
            //     'name'=>'required',
            //     'from_date'=>'required|date',
            //     'start_place'=>'required',
            //     'to_date'=>'required|date',
            //     'price'=>'required',
            //     'status'=>'required',
            //     'transport'=>'required',
            //     'type'=>'required',
            // ],[
            //     'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
            //     'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            //     'name.required'=>'Bạn chưa nhập name',
            //     'start_place.required'=>'Bạn chưa nhập địa điểm',
            //     'from_date.required'=>'Bạn chưa nhập ngày đi',
            //     'from_date.date' => 'cột produced_on phải là kiểu ngày!',
            //     'to_date.required'=>'Bạn chưa nhập ngày về ',
            //     'to_date.date' => 'cột produced_on phải là kiểu ngày!',
            //     'price.required'=>'Bạn chưa bạn chưa nhập giá',
            //     'status.required'=>'Bạn chưa bạn chưa nhập status',
            //     'transport.required'=>'Bạn chưa bạn chưa nhập transport',
            //     'type.required'=>'Bạn chưa bạn chưa nhập type',
            // ]);   
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('travel/', $fileName);
        }
        
        $travel = new Travel();
        
            $travel->name = $request->name;
            $travel->image = $fileName;
            $travel->start_place=$request->start_place;
            $travel->from_date=$request->from_date;
            $travel->to_date = $request->to_date;
            $travel->price = $request->price;
            $travel->status = $request->status;
            $travel->transport = $request->transport;
            $travel->type = $request->type;
            $travel->save();
            return redirect()->route('index_travel')->with('success', 'Thêm thành công');
    }

   // Xóa tour 
    function postDeleteTravel($id){
        $travel =Travel::find($id);
        $travel->delete();
        return redirect()->route('index_travel')->with('success', 'Xóa thành công');
    }
    // form sửa tour
    public function getEditTravel($id){
        $travel = Travel::find($id);
        return view('travel.formedit',compact('travel'));
    }
// Sửa tour:
    public function postEditTravel(Request $request){
        $id = $request->id;
        $travel = Travel::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName('image');
            $file->move('travel',$fileName);
        }
        if($request->file('image')!=null){
            $travel->image = $fileName;
        }
            $travel->name = $request->name;
            $travel->image = $fileName;
            $travel->start_place=$request->start_place;
            $travel->from_date=$request->from_date;
            $travel->to_date = $request->to_date;
            $travel->price = $request->price;
            $travel->status = $request->status;
            $travel->transport = $request->transport;
            $travel->type = $request->type;
        $travel->save();
        return redirect()->route('index_travel')->with('success', 'Sửa thành công');
    
    }
}
