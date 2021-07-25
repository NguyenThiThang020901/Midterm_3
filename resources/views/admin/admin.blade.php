
@extends('matter')
@section('content')
<div class="spaces50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left"><h2>List Product</h2></div>
    <div class="pull-right">
        <input type="text" placeholder="Search ID">
    </div>
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="container">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Unit_price</th>
                <th scope="col">Promotion_price</th>
                <th scope="col">Unit</th>
                <th scope="col">New</th>
                <th scope="col"><a href="/getadminAdd" class="btn btn-primary" style="width:80px;">add</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td><img src="source/image/product/{{$product->image}}" style="height: 100px;" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->id_type}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->unit_price}}</td>
                <td>{{$product->promotion_price}}</td>
                <td>{{$product->unit}}</td>
                <td>{{$product->new}}</td>
                <td>
                    <form role="form"action="/getadminEdit/{{$product->id}}" method="get">
                        @csrf 
                        <button name="edit" class="btn btn-warning" style="width:80px;">Edit</button>
                    </form>
                    <form role="form"action="/adminDelete/{{$product->id}}" method="post">
                        @csrf 
                        <button name="delete" class="btn btn-danger" style="width:80px;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="space50">&nbsp;</div>
@endsection

