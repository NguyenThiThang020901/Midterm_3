<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Export Notes List PDF - Tutsmake.com</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <style>
   .container{
    padding: 5%;
   } 

  
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
           <a href="{{ url('export') }}" class="btn btn-success mb-2">Export PDF</a>
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>id_type</th>
                 <th>description</th>
                 <th>unit_price</th>
                 <th>promotion_price</th>
                 <th>image</th>
                 <th>unit</th>
                 <th>new</th>
                 <th>Created at</th>
                 <th>Update at</th>
              </tr>
           </thead>
           <tbody>
           @foreach($products as $product)
              <tr>
                 <td>{{ $product->id }}</td>
                 <td>{{ $product->name }}</td>
                 <td>{{ $product->id_type }}</td>
                 <td>{{ $product->description }}</td>
                 <td>{{ $product->unit_price }}</td>
                 <td>{{ $product->promotion_price }}</td>
                 <td>{{ $product->image }}</td>
                 <td>{{ $product->unit_price }}</td>
                 <td>{{ $product->new }}</td>
                 <td>{{ date('d m Y', strtotime($product->created_at)) }}</td>
                 <td>{{ date('d m Y', strtotime($product->updated_at)) }}</td>
              </tr>
              @endforeach
           </tbody>
          </table>
         
       </div> 
   </div>
</div>
</body>
</html>