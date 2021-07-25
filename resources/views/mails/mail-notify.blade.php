
<body>
   <h2 style="color: blue;">{{ $data['type'] }}</h2>
      <p style="color: brown;" >Kính Chào Quý Khách </p>
      <p><b>{{ $data['thanks'] }}</b></p>

   <table border="1">
   <tr>
            <th colspan="2" style="color: red;">THÔNG TIN ĐƠN HÀNG CỦA BẠN</th>
        </tr>
         @if(isset($data['cart']))
         @foreach($data['cart']->items as $product)
        <tr>
            <th>Tên Bánh</th>
            <th>Số Lượng</th>
        </tr>
        <tr>
            <td>{{$product['item']['name']}}</td>
            <td>{{$product['qty']}}</td>
        </tr>
        @endforeach
         @endif
         <tr>
            <th colspan="2">Tổng tiền</th>
        </tr>
        <tr>
            <td colspan="2"  style="color: red; text-align: center ">@if(isset($data['cart'])){{number_format($data['cart']->totalPrice)}}@else 0 @endif đồng</td>
        </tr>
    </table>
    <p>{{ $data['content'] }}</p>
</body>
	</div> <!-- .container -->