@extends('matter')
@section('content')
<div class="space50">&nbsp;</div>
    <div class="container beta-relative">
        <div class="pull-left"><h2>Sửa sản phẩm</h2></div>
        <div class="pull-right"><input type="text" placeholder="Search ID"></div>
        <div class="space50">&nbsp;</div>
        @include('admin/error')
        <div class="container">
            <img src="source/image/product/{{$product->image}}" style="height: 100px;" alt="">
            <form role="form" style="width:55%" action="/adminEdit" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="1">Type</label>
                    <input type="text" class="form-control" name="type" id="6" placeholder="Enter type" value="{{$product->id_type}}">
                </div>
                <div class="form-group">
                    <label for="1">Description</label>
                    <input type="text" class="form-control" name="description" id="2" placeholder="Enter your description"value="{{$product->description}}">
                </div>
                <div class="form-group">
                    <label for="1">Price</label>
                    <input type="text" class="form-control" name="unit_price" id="1" placeholder="Enter unit price" value="{{$product->unit_price}}">
                </div>
                <div class="form-group">
                    <label for="1">Promotion</label>
                    <input type="text" class="form-control" name="promotion_price" id="3" placeholder="Enter promotion price" value="{{$product->promotion_price}}">
                </div>
                <div class="form-group">
                    <label for="1">Unit</label>
                    <input type="text" class="form-control" name="unit" id="4" placeholder="Enter unit" value="{{$product->unit}}"> 
                </div>
                <div class="form-group">
                    <label for="1">New</label>
                    <input type="text" class="form-control" name="new" id="5" placeholder="Enter new" value="{{$product->new}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image file</label>
                    <input type="file" class="form-control" name="image" id="exampleFormControlFile1">
                </div>
                <input type="text" name="id" hidden value="{{$product->id}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <div class="space50">&nbsp;</div>   
@endsection