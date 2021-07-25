@extends('matter')
@section('content')
<div class ="space50">&nbsp</div>
<div class ="container beta-relative">
    <div class ="pull-left">
    <h2>Thêm sảm phẩm</h2>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class ="space50">&nbsp</div>
    <div class ="container">
        <form action="/postadminAdd" method ="post" enctype="multipart/form-data">
        @csrf
            <div class ="form-group">
            <label >Name:</label><br>
            <input type="text" id="name" name="name" >
            </div>
            <div class ="form-group">
            <label >Price:</label><br>
            <input type="text" id="1" name="unit_price" >
            </div>
            <div class ="form-group">
            <label >Description:</label><br>
            <input type="text" id="2" name="description" >
            </div>
            <div class ="form-group">
            <label >Promotion:</label><br>
            <input type="text" id="name" name="promotion_price" >
            </div>
            <div class ="form-group">
            <label >Unit:</label><br>
            <input type="text" id="3" name="unit" >
            </div>
            <div class ="form-group">
            <label >New:</label><br>
            <input type="text" id="4" name="new" >
            </div>
            <div class ="form-group">
            <label >Type:</label><br>
            <input type="text" id="5" name="type" >
            </div>
            <div class ="form-group">
            <label >Image file:</label><br>
            <input type="file" id="" name="image" >
            </div>
            <input type="submit" class ="btn btn-primary"value="Submit">
        </form> 
    </div>
<div class="space50">&nbsp;</div>
@endsection