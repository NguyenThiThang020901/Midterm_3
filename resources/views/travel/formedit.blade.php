@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left">
        <h2> Thêm Tour</h2>
    </div>
</div>
<div class="space50">&nbsp;</div>
<div class="container">
<img src="travel/{{$travel->image}}" style="height: 100px;" alt="">
    <form action="/editTravel" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name:</label><br>
            <input type="text" name="name" value="{{$travel->name}}">
        </div>
        <div class="form-group">
            <label>Nơi khởi hành:</label>
            <select class="form-control" name="start_place" value="{{$travel->start_place}} ">
                <option >--Hồ Chí Minh--</option>
                <option>--Bình Dương--</option>
                <option>--Buồn Ma Thuột--</option>
                <option>--Cà Mau--</option>
                <option>--Cần Thơ--</option>
                <option>--Đà Lạt--</option>
                <option>--Đà Nẵng--</option>
                <option>--Hà Nội--</option>
                <option>--Hải Phong --</option>
                <option>--Huế--</option>
                <option>--Long Xuyên--</option>
                <option>--Nha Trang--</option>
                <option>--Phú Quốc--</option>
                <option>--Quảng Ninh--</option>
                <option>--Quy Nhơn--</option>
            </select>
        </div>
        <div class="form-group">
            <label>Vận chuyển:</label>
            <select class="form-control" name="transport">
                <option>--Tất cả--</option>
                <option>--Máy bay--</option>
                <option>--Ô tô--</option>
            </select>
        </div>
        <div class="form-group">
            <label>Giá:</label>
            <select class="form-control" name="price">
                <option>50000</option>
                <option>10000</option>
                <option>20000</option>
                <option>30000</option>
                <option>60000</option>
                <option>10000</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tình trạng:</label>
            <select class="form-control" name="status">
                <option>Còn chỗ</option>
                <option>Hết chỗ</option>
            </select>
        </div>
        <div class="form-group">
            <label>Từ ngày:</label>
                <input   name="from_date" value="{{$travel->from_date}}">

        </div>
        <div class="form-group">
            <label>Đến ngày:</label>
                <input   name="to_date" value="{{$travel->to_date}}">
        </div>

        <div class="form-group">
            <label>Dòng tour:</label>
            <select class="form-control" name="type">
                <option>--Tất cả--</option>
                <option>--Cao cấp--</option>
                <option>--Tiêu chuẩn--</option>
                <option>--Tiết kiệm--</option>
                <option>--Giá tốt--</option>
            </select>
        </div>
        <div class="form-group">
            <label>Image file:</label><br>
            <input type="file" id="" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="space50">&nbsp;</div>
@endsection