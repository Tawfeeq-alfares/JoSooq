@extends('layouts.webmain')
@section('content')
<!-- Submit Ad -->
<div class="submit-ad main-grid-border">
	<div class="container">
		<h2 class="head">Post an Ad</h2>
		<div class="post-ad-form">
			<form action="{{url('/selectcategorie')}}" method="POST">
				{{csrf_field()}}

								@if($errors->all())
				@foreach ($errors->all() as $error)
				<div class="alert alert-danger">

					<li>{{ $error }}</li>
				</div>
				@endforeach
				@endif
				
				<label>Select Category <span>*</span></label>
				<select class="" name="selectcategorie">
					@foreach($categories as $categorie)
					<option>{{$categorie->categ_name}}</option>
					@endforeach
				</select>
		
						<a><input type="submit" value="Next"></a>					
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>	
	</div>
	<!-- // Submit Ad -->
	@endsection