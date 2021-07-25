<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Http\Requests\TravelRequest;

class TravelController extends Controller
{
    function addTravel(){
        return view('travel.form');
    }
    function getIndex(){
        $travel =Travel::all();
        return view('travel.index',compact('travel'));  
    }
    function postTravel(Request $request){       
        $travel = new Travel();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('source/image/product', $fileName);
        }
            $file_name=null;
            if($request->file('image')!=null){
                $file_name = $request->file('image')->getClientOriginalName();
            }
            $travel->name = $request->name;
            $travel->image = $file_name;
            $travel->start_place=$request->start_place;
            $travel->from_date=$request->from_date;
            $travel->to_date = $request->to_date;
            $travel->price = $request->price;
            $travel->status = $request->status;
            $travel->transport = $request->transport;
            $travel->type = $request->type;
            $travel->save();
            return $this->getIndex();
    }
}
