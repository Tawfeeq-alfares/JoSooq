@extends('layouts.webmain')
@section('content')

<!-- content-starts-here -->
<div class="content">

	
	
	
	
	<div class="categories">
		<div class="container">
			@foreach($categories as $categorie)
			<div class="col-md-2 focus-grid">
				<a href="{{url('/catigories')}}">
					<div class="focus-border">
						<div class="focus-layout">
							<div class="focus-image">
								<i>
									@if($categorie->categ_image=='')
									<img src="{{url('/storage/uploades/default-image-620x600.jpg')}}" style="height: 100px;width: 100px;">
									
									@else
									<img src="{{url('/storage/uploades/')}}/{{$categorie->categ_image}}" style="height: 100px;width: 100px;">
									@endif
								</i>
							</div>

							<h4 class="clrchg">{{ $categorie->categ_name}}</h4>
						</div>
					</div>
				</a>
			</div>
			
			@endforeach

			<div class="col-md-2 focus-grid">
				<a href="{{url('/catigories')}}">
					<div class="focus-border">
						<div class="focus-layout">
							<div class="focus-image"><i class="fa"></i></div>
							<h4 class="clrchg">All</h4>
						</div>
					</div>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="trending-ads">
		<div class="container">
			<!-- slider -->
			<div class="trend-ads">
				<h2>Trending Ads</h2>
				<ul id="flexiselDemo3">
					<li>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p1.jpg"/>
								<span class="price">&#36; 450</span>
							</a> 
							<div class="ad-info">
								<h5>There are many variations of passages</h5>
								<span>1 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p2.jpg"/>
								<span class="price">&#36; 399</span>
							</a> 
							<div class="ad-info">
								<h5>Lorem Ipsum is simply dummy</h5>
								<span>3 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p3.jpg"/>
								<span class="price">&#36; 199</span>
							</a> 
							<div class="ad-info">
								<h5>It is a long established fact that a reader</h5>
								<span>8 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p4.jpg"/>
								<span class="price">&#36; 159</span>
							</a> 
							<div class="ad-info">
								<h5>passage of Lorem Ipsum you need to be</h5>
								<span>19 hour ago</span>
							</div>
						</div>
					</li>
					<li>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p5.jpg"/>
								<span class="price">&#36; 1599</span>
							</a> 
							<div class="ad-info">
								<h5>There are many variations of passages</h5>
								<span>1 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p6.jpg"/>
								<span class="price">&#36; 1099</span>
							</a> 
							<div class="ad-info">
								<h5>passage of Lorem Ipsum you need to be</h5>
								<span>1 day ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p7.jpg"/>
								<span class="price">&#36; 109</span>
							</a> 
							<div class="ad-info">
								<h5>It is a long established fact that a reader</h5>
								<span>9 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p8.jpg"/>
								<span class="price">&#36; 189</span>
							</a> 
							<div class="ad-info">
								<h5>Lorem Ipsum is simply dummy</h5>
								<span>3 hour ago</span>
							</div>
						</div>
					</li>
					<li>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p9.jpg"/>
								<span class="price">&#36; 2599</span>
							</a> 
							<div class="ad-info">
								<h5>Lorem Ipsum is simply dummy</h5>
								<span>3 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p10.jpg"/>
								<span class="price">&#36; 3999</span>
							</a> 
							<div class="ad-info">
								<h5>It is a long established fact that a reader</h5>
								<span>9 hour ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p11.jpg"/>
								<span class="price">&#36; 2699</span>
							</a> 
							<div class="ad-info">
								<h5>passage of Lorem Ipsum you need to be</h5>
								<span>1 day ago</span>
							</div>
						</div>
						<div class="col-md-3 biseller-column">
							<a href="{{url('/single_ads')}}">
								<img src="{{url('/')}}/websitetheme/images/p12.jpg"/>
								<span class="price">&#36; 899</span>
							</a> 
							<div class="ad-info">
								<h5>There are many variations of passages</h5>
								<span>1 hour ago</span>
							</div>
						</div>
					</li>
				</ul>
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems:1,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 5000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems:1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:1
								},
								tablet: { 
									changePoint:768,
									visibleItems:1
								}
							}
						});
						
					});
				</script>
				<script type="text/javascript" src="{{url('/')}}/websitetheme/js/jquery.flexisel.js"></script>
			</div>   
		</div>
		<!-- //slider -->				
	</div>
	<div class="mobile-app">
		<div class="container">
			<div class="col-md-5 app-left">
				<a href="#"><img src="{{url('/')}}/websitetheme/images/app.png" alt=""></a>
			</div>
			<div class="col-md-7 app-right">
				<h3>Resale App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius euismod. Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at elementum. Suspendisse et condimentum nibh.</p>
				<div class="app-buttons">
					<div class="app-button">
						<a href="#"><img src="{{url('/')}}/websitetheme/images/1.png" alt=""></a>
					</div>
					<div class="app-button">
						<a href="#"><img src="{{url('/')}}/websitetheme/images/2.png" alt=""></a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>





@endsection