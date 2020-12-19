@extends('layouts.webmain')
@section('content')
<!--single-page-->
<div class="single-page main-grid-border">
	<div class="container">
		<ol class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="{{url('/home')}}">Home</a></li>
			<li class="active"><a href="{{url('/catigories')}}">{{$categories[0]->categ_name}}</a></li>
			<li><a href="{{url('/all_ads'.'/'.$post[0]->categ_id)}}">All Ads</a></li>
			<li class="active">{{$subcategories[0]->sub_name}}</li>
		</ol>
		<div class="product-desc">
			<div class="col-md-7 product-view">
				<h2>{{$post[0]->post_title}}</h2>
				<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| {{$post[0]->created_at}}, Ad ID :{{$post[0]->post_id}}</p>
				
				<iframe src ="{{url('/storage/uploades/Admin.pdf')}}" width="600px" height="600px"></iframe>
				<!-- //FlexSlider -->
				<div class="product-details">
					<h4>Views : <strong>150</strong></h4>
					<p><strong>Summary</strong> {{$post[0]->post_description}}</p>
					
				</div>
			</div>
			<div class="col-md-5 product-details-grid">
				<div class="item-price">
					<div class="product-price">
						<p class="p-price">Name</p>
						<h3 class="rate">{{$post[0]->post_name}}</h3>
						<div class="clearfix"></div>
					</div>
					<div class="condition">
						<p class="p-price">Email</p>
						<h4>{{$post[0]->post_email}}</h4>
						<div class="clearfix"></div>
					</div>
					<div class="itemtype">
						<p class="p-price">Phone</p>
						<h4>{{$post[0]->post_phone}}</h4>
						<div class="clearfix"></div>
					</div>
				</div>
				
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--//single-page-->
@endsection