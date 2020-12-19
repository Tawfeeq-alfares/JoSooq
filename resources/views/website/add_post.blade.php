@extends('layouts.webmain')
@section('content')
<!-- Submit Ad -->
<div class="submit-ad main-grid-border">
	<div class="container">
		<h2 class="head">Post an Ad</h2>
		<div class="post-ad-form">
			
			<form action="{{url('/insertpost')}}" method="POST">
				{{csrf_field()}}

					@foreach ($errors->all() as $error)
				<div class="alert alert-danger">
					
					<li>{{ $error }}</li>
				</div>
				@endforeach
				
				<label>Select Category <span>*</span></label>
				<select class="" id="type" name="selectcategorie">
					@foreach($categories as $categorie)
					<option>{{$categorie->categ_name}}</option>
					@endforeach
				</select>

				<div class="clearfix"></div>
				<label>Select Type Post <span>*</span></label>
				<select class="" name="posttypeselect">
					@foreach($posttypes as $posttype)
					<option>{{$posttype->post_type_name}}</option>
					@endforeach

				</select>
				<div class="clearfix"></div>
				<label>Select SubCategory </label>
				<select class="show" name="subcategorieselect"><option>Choose...</option></select>
				
				<div class="clearfix"></div>
				<label>Ad Title <span>*</span></label>
				<input type="text" class="phone" name="titlepost" placeholder="">
				<div class="clearfix"></div>
				<label>Ad Description <span>*</span></label>
				<textarea class="mess" name="descriptionpost" placeholder="Write few lines about your product"></textarea>
				<div class="clearfix"></div>
				<div class="personal-details">
					
					<label>Your Name <span>*</span></label>
					<input type="text" name="namepost" class="name" placeholder="">
					<div class="clearfix"></div>
					<label>Your Mobile No <span>*</span></label>
					<input type="text" name="mobilepost" class="phone" placeholder="">
					<div class="clearfix"></div>
					<label>Your Email Address<span>*</span></label>
					<input type="text" name="emailpost" class="email" placeholder="">
					<div class="clearfix"></div>
					<p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
					<input type="submit" value="Post">					
					<div class="clearfix"></div>
				</div>
			</form>
			

		</div>
	</div>	
</div>
<!-- // Submit Ad -->

<script>
	var url = $('meta[name=base_url]').attr("content");
  var csrf_token = $('meta[name=csrf_token]').attr("content");

	 $("#type").change(function(e){

    var type = $('#type').val();

    //alert(type);
    $.ajax({
      type:'POST',
      url:'/gettypes',
      data:{

       type:type,
       _token:csrf_token
     },
     success:function(response){
      if (response.status == true) {
        $('.show').empty();
        $('.show').append('<option>Choose...</option>');
        console.log('success');
        var array1=response.t;
        var array2=array1.length;
        if (array2-1 == 0) {
        	$('.show').append('<option>its empty</option>');
        }
        for (var i = 0; i <= array2-1; i++) {
          console.log(array1[i]);
          $('.show').append('<option> ' + array1[i] + ' </option>');
        }
//alert(response.t);
}else{
 console.log('error');
}
},
error:function(xhr){
  console.log(xhr);
},
complete:function(data){
  data="";  
}

});


    e.preventDefault();
  });
</script>
@endsection