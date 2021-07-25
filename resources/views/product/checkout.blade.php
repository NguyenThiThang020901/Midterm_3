@extends('matter')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Checkout</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="/homepage">Home</a> / <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<form action="/checkout" method="post" class="beta-form-checkout">
			<input type ="hidden"name ="_token" value ="{{csrf_token()}}" >
			<!-- @csrf -->
			<div class="row" style="color: blue;">
			@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif
			</div>
				<div class="row">
				<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						@if(Auth::check()) 	 
						<div class="form-block">
							<label > Name</label>
							<input type="text" name ="full_name" id="" value="{{Auth::user()->full_name}} " required>
						</div>
						
						<div class="form-block">
							<label for="your_last_name">Gender </label>
							<input type="radio" name="gender" class="input-radio" value ="Nam" 
							checked="checked" style="width: 10px;">
							<span style="margin-right:10%">Nam</span>
							<input type="radio" name="gender" class="input-radio" value ="Nu" 
							checked="checked" style="width: 10px;">
							<span>Nu</span>
						</div>
						
						<div class="form-block">
							<label for="email">Email</label>
							<input type="email" name="email" value="{{Auth::user()->email}} " id="email" required>
						</div>
						

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" id="adress" value="{{Auth::user()->address}} " placeholder="Đà Nẵng" required>
						</div>
						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="number" name ="phone" value="{{Auth::user()->phone}} " required>
						</div>
						@endif
						<div class="form-block">
							<label for="notes">Order notes</label>
							<textarea id="notes" name ="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn đặt hàng của bạn</h5></div>
							<div class="your-order-body">
							<div class="your-order-item">
							<div> 
									@if(Session::has('cart')) 
									@foreach($product_cart as $cart)
									 <!-- one item	 -->
										<div class="media">
											<img width="35%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Giá:{{$cart['item']['price']}}</span>
												<span class="color-gray your-order-info">Size: M</span>
												<span class="color-gray your-order-info">Qty:{{$cart['qty']}}</span>
											</div>
										</div> 
									<!-- end one item -->
								@endforeach
								@endif
								</div>
									<div class="clearfix"></div>
 								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
 									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{Session('cart')->totalPrice}}@else 0 @endif đồng</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
 							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
													
							 <div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" >
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ đến giao đến địa chỉ của bạn, vui lòng thanh toán khi nhận hàng
											Cảm ơn quý khách:))
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" >
										<label for="payment_method_cheque">Chuyển khoản</label>
										<div class="payment_box payment_method_cheque" style="display: none;">
										Vui lòng gửi séc của bạn đến Tên cửa hàng, Phố cửa hàng, Thị trấn cửa hàng, 
										Bang / Hạt cửa hàng, Mã bưu điện cửa hàng.
										</div>						
									</li>
									
									<li class="payment_method_paypal">
										<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal" >
										<label for="payment_method_paypal">Thanh Toán PayPal</label>
										<div class="payment_box payment_method_paypal" style="display: none;">
											
										Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account
										Chuyển tiền đến tài khoản sau:
										<br> Số tài khoản:123 456 789
										<br> Chủ tk: Hồ Thị Hươu
										<br> Ngân hang Vietcombank, chi nhánh Đà Nẵng
									</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
							<div class="text-center" id="paypal-button"></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection

