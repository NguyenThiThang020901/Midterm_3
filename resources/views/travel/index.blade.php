@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div class="container">
<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left">
        <h2 style="color: blue " > Thêm Tour</h2>
    </div>
</div>
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
@endif
@if ($errors->any())
   <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
   </div>
   @endif
<div class="space50">&nbsp;</div>
<div class="container">
    <form action="/addTravel" method="post" enctype="multipart/form-data">
        @csrf
        <div class ="row">
            <div class="col-sm-3">
                    
                <div class="form-group">
                    <label>Name:</label><br>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Nơi khởi hành:</label>
                    <select class="form-control" name="start_place">
                        <option>--Hồ Chí Minh--</option>
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
            
            </div>
            <div class="col-sm-3">   
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
                
            </div>
            <div class="col-sm-3">   
                
                <div class="form-group">
                    <label>Từ ngày:</label>
                    
                        <input type="datetime-local" id="start_date" name="from_date"/>
                    
                </div>
                <div class="form-group">
                    <label>Đến ngày:</label>
                    
                        <input type="datetime-local" id="end_date" name="to_date"/>
                   
                </div>
            </div>
            <div class="col-sm-3">   
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
            </div>

                
        
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="space50">&nbsp;</div>
    @foreach($travel as $travels)
    <div class="container-fluid">
        <h2 style="color: red " >{{$travels->name}}</h2>
        <hr  width="30%" align="center" /> 
        <div class="row">
            <div class="col-sm-4">
            <img src="travel/{{$travels->image}}" alt="" style="width: 250px; height:150px">
            </div>
            <div class="col-sm-3">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>        
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>Mã tour: {{$travels->id}}</div>
                <div>Ngày đi: {{$travels->from_date}}</div>
                <div>Ngày về: {{$travels->to_date}}</div>
                <div>Giá: {{$travels->price}}</div>
           
            </div>

            <div class="col-sm-3">
                <div>Nơi khởi hành: {{$travels->start_place}}</div>
                <div>Tình trạng: {{$travels->status}}</div>
                <div>Dòng tour: {{$travels->type}}</div>
                <div>Vận chuyển: {{$travels->transport}}</div>
            </div>
            <div class ="col-sm-3">
                    <form role="form"action="/editTravel/{{$travels->id}}" method="get">
                        @csrf 
                        <button name="edit" class="btn btn-warning" style="width:80px;">Edit</button>
                    </form>
                    <form role="form"action="/deleteTravel/{{$travels->id}}" method="post">
                        @csrf 
                        <button name="delete" class="btn btn-danger" style="width:80px;">Delete</button>
                        
                    </form>
            </div>
        </div><br><br><br>
    </div>
    @endforeach
</div>
<div class="space50">&nbsp;</div>
@endsection