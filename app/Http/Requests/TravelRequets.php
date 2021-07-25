<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class travelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'start_place' => 'required|max:255',
            'from_date'=>'required|date',
            'to_date'=>'required|date',
            'price'=>'required|numeric|min:10000|max:20000000',
            'status' =>'required|string',
            'transport' => 'required|string',
            'type'=>'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
          
    public function message(){
        return [
            'name.string'=>'Vui lòng chọn tên tour',
            'start_place.string'=>'Vui lòng chọn nơi hởi hành',
            'from_date.date'=>'Vui lòng chọn ngày bắt đầu',
            'to_date.date'=>'Vui lòng chọn ngày kết thúc',
            'price.numeric'=>'Vui lòng chọn giá',
            'status.string' => 'vui lòng điền status',
            'transport.string'=>'Vui lòng hình thức vận chuyển',                       
            'type.string'=>'Vui lòng chọn dòng tour',
            'file.required'=>'Vui long chon anh',

        ];

    }
}