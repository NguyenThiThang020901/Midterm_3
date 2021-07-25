@extends('matter');
@section('content');
<div class="container">
		<div id="content">
			
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
		@if(Session::has('thanhcong'))
		<div class="alert-success">{{Session::get('thanhcong')}}</div>
		@endif
			<form action="/signup" method="post" class="beta-form-checkout">
			@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email"  name ="email" required >
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name ="full_name" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" name ="address" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="number" id="phone" name ="phone" required>
						</div>
						<div class="form-block">
							<label >Password*</label>
							<input type="password"  name ="password" required>
						</div>
						<div class="form-block">
							<label >Re password*</label>
							<input type="password" name ="re_password" irequired>
						</div>
						<!-- Captcha -->
						<div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_KEY')}}"></div>
      					<br/>
						  @if($errors->has('g-recaptcha-response'))
						 <span class="invalid-feekback" style="display:block">
						 <strong>{{$errors->first('g-recaptcha-response')}}</strong>
						 </span>
						  @endif
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content');