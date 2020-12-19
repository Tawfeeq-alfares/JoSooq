@extends('layouts.auth')
@section('content')

<div id="page-wrapper" class="sign-in-wrapper">
	<div class="graphs">
		<div class="sign-up">
			<h1>Create an account</h1>
			<p class="creating">Having hands on experience in creating innovative designs,I do offer design 
			solutions which harness.</p>
			<h2>Personal Information</h2>
			<form action="{{url('/insertuser')}}" method="POST">
				{{ csrf_field() }}

				@foreach ($errors->all() as $error)
				<div class="alert alert-danger">
					
					<li>{{ $error }}</li>
				</div>
				@endforeach
				<div class="sign-u">
					<div class="sign-up1">
						<h4>Name :</h4>
					</div>
					<div class="sign-up2">
						<input type="text" name="user_name" value="{{ old('user_name')}}" placeholder=" " required=" "/>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="sign-u">
					<div class="sign-up1">
						<h4>Email Address :</h4>
					</div>
					<div class="sign-up2">

						<input type="text" name="email" value="{{ old('user_email')}}" placeholder=" " required=" "/>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="sign-u">
					<div class="sign-up1">
						<h4>Phone :</h4>
					</div>
					<div class="sign-up2">

						<input type="text" name="user_phone" value="{{ old('user_phone')}}" placeholder=" " required=" "/>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="sign-u">
					<div class="sign-up1">
						<h4>Password :</h4>
					</div>
					<div class="sign-up2">

						<input type="password" name="password" placeholder=" " required=" "/>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="sign-u">
					<div class="sign-up1">
						<h4>Confirm Password :</h4>
					</div>
					<div class="sign-up2">

						<input type="password" name="conig_password" placeholder=" " required=" "/>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="sub_home">
					<div class="sub_home_left">

						<button type="submit">Create</button>

					</div>

					<div class="clearfix"> </div>
				</div>
			</form>
			<div class="sub_home_right">
				<p>Go Back to <a href="index.html">Home</a></p>
			</div>
		</div>
	</div>
</div>
@endsection