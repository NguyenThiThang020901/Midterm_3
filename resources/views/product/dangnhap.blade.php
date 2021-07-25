@extends('matter');
@section('content');
<div class="container">
		<div id="content">
		@if(Session::has('flag'))
		<div class="alert-alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
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
		<!-- @if(Session::has('thanhcong'))
		<div class="alert-success">{{Session::get('thanhcong')}}</div>
		@endif -->
			<form action="/login" method="post" class="beta-form-checkout">
			@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email"  name ="email" required >
						</div>
						<div class="form-block">
							<label >Password*</label>
							<input type="password"  name ="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content');