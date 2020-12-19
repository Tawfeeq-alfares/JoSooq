@extends('layouts.auth')
@section('content')
<div id="page-wrapper" class="sign-in-wrapper">

	<div class="graphs">
		<div class="sign-in-form">
			<div class="sign-in-form-top">
				<h1>Log in</h1>
			</div>
			<div class="signin">
				<div class="signin-rit">
					<span class="checkbox1">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>
					</span>
					<p><a href="#">Click Here</a> </p>
					<div class="clearfix"> </div>
				</div>
				
				<form action="{{url('/chickuser')}}" method="POST">
					{{ csrf_field() }}
					@if(Session::has('unsuccess'))
					<div class="col-12">
						<div class="alert alert-danger">

							<li>{{ Session::get('unsuccess') }}</li>
						</div>
					</div>
					@endif
					
					<div class="log-input">
						@foreach ($errors->all() as $error)
						<div class="alert alert-danger">

							<li>{{ $error }}</li>
						</div>
						@endforeach

						<div class="log-input-left">
							@if(Session::has('error'))
							{{session::get('error')}}
							@endif
							
							<h4>Email :</h4><br>
							<input type="text" class="user" value="" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}"/>

						</div>
						<span class="checkbox2">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
						</span>
						<div class="clearfix"> </div>
					</div>
					<div class="log-input">
						<div class="log-input-left">
							<h4>Password :</h4><br>
							<input type="password" class="lock" value="" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
						</div>
						<span class="checkbox2">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
						</span>
						<div class="clearfix"> </div>
					</div>

					
					<input type="submit" value="Log in">
				</form>	 
			</div>
			<div class="new_people">
				<h2>For New People</h2>
				<p>Having hands on experience in creating innovative designs,I do offer design 
				solutions which harness.</p>
				<a href="{{url('/registeruser')}}">Register Now!</a>
			</div>
		</div>
	</div>
</div>


@endsection