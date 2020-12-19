@extends('layouts.webmain')
@section('content')
<!-- Products -->
<div class="total-ads main-grid-border">
	<div class="container">
		<div class="select-box">
			<div class="select-city-for-local-ads ads-list show-tick" data-live-search="true">
				<label>Select Categories</label>
				<select>
						@foreach($categories as $categorie)
							<option data-tokens="{{$categorie->categ_name}}">{{$categorie->categ_name}}</option>
						@endforeach
				</select>
			</div>
			<div class="browse-category ads-list">
				<label>Select  SubCategories</label>
				<select class="selectpicker show-tick" data-live-search="true">
						@foreach($subcategories as $subcategorie)
							<option data-tokens="{{$subcategorie->sub_name}}">{{$subcategorie->sub_name}}</option>
						@endforeach
				</select>
			</div>
			<div class="search-product ads-list">
				<label>Search for a specific product</label>
				<div class="search">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="form-control input-lg" placeholder="Buscar" />
							<span class="input-group-btn">
								<button class="btn btn-info btn-lg" type="button">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="all-categories">
			<h3> Select your category and find the perfect ad</h3>
			<ul class="all-cat-list">
				@foreach($categories as $categorie)
				<li><a href="{{url('/all_ads/'.$categorie->categ_id)}}">{{$categorie->categ_name}} <span class="num-of-ads">({{App\Post::where('categ_id','=',$categorie->categ_id)->get()->count()}})</span></a></li>
				@endforeach
				
			</ul>
		</div>
		<ol class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="{{url('/home')}}">Home</a></li>
			<li class="active">All Ads</li>
		</ol>
		<div class="ads-grid">
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="sear-head">Name contains</h3>
					<form>
						<input type="text" value="Product name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Product name...';}" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				
				
					<div class="featured-ads">
						<h2 class="sear-head fer">Featured Ads</h2>
						<div class="featured-ad">
							<a href="single.html">
								<div class="featured-ad-left">
									<img src="{{url('/')}}/websitetheme/images/f1.jpg" title="ad image" alt="" />
								</div>
								<div class="featured-ad-right">
									<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
									<p>$ 450</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</div>
						<div class="featured-ad">
							<a href="single.html">
								<div class="featured-ad-left">
									<img src="{{url('/')}}/websitetheme/images/f2.jpg" title="ad image" alt="" />
								</div>
								<div class="featured-ad-right">
									<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
									<p>$ 380</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</div>
						<div class="featured-ad">
							<a href="single.html">
								<div class="featured-ad-left">
									<img src="{{url('/')}}/websitetheme/images/f3.jpg" title="ad image" alt="" />
								</div>
								<div class="featured-ad-right">
									<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
									<p>$ 560</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="ads-display col-md-9">
					<div class="wrapper">					
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
								<li role="presentation" class="active">
									<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
										<span class="text">All Ads</span>
									</a>
								</li>
								<li role="presentation" class="next">
									<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
										<span class="text">Job Seekers</span>
									</a>
								</li>
								<li role="presentation">
									<a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">
										<span class="text">Vacancies </span>
									</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<!-- all ads -->
								<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
									<div>
										<div id="container">
											<div class="view-controls-list" id="viewcontrols">
												<label>view :</label>
												<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
												<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
											</div>
											<div class="sort">
												<div class="sort-by">
													<label>Sort By : </label>
													<select>
														<option value="">Most recent</option>
														<option value="">Price: Rs Low to High</option>
														<option value="">Price: Rs High to Low</option>
													</select>
												</div>
											</div>
											<div class="clearfix"></div>
											<ul class="list">
													@foreach($postsforcategorie as $post)
												<a href="{{url('/single_ads').'/'.$post->post_id}}">
												
													<li>
														<img src="{{url('/storage/uploades/default-image-620x600.jpg')}}" title="" alt="" />
														<section class="list-left">
															<h5 class="title">{{$post->post_title}}</h5>
															
															<p class="catpath">{{$post->post_phone}}</p>
														</section>
														<section class="list-right">
															<span class="date">{{$post->created_at}}</span>
															
														</section>
														<div class="clearfix"></div>
													</li> 
													
												</a>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								<!-- Job Seekers -->
								<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
									<div>
										<div id="container">
											<div class="view-controls-list" id="viewcontrols">
												<label>view :</label>
												<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
												<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
											</div>
											<div class="sort">
												<div class="sort-by">
													<label>Sort By : </label>
													<select>
														<option value="">Most recent</option>
														<option value="">Price: Rs Low to High</option>
														<option value="">Price: Rs High to Low</option>
													</select>
												</div>
											</div>
											<div class="clearfix"></div>
											<ul class="list">
													@foreach($poststype1 as $post)
												<a href="{{url('/single_ads/').$post->post_id}}">
												
													<li>
														<img src="{{url('/storage/uploades/default-image-620x600.jpg')}}" title="" alt="" />
														<section class="list-left">
															<h5 class="title">{{$post->post_title}}</h5>
															
															<p class="catpath">{{$post->post_phone}}</p>
														</section>
														<section class="list-right">
															<span class="date">{{$post->created_at}}</span>
															
														</section>
														<div class="clearfix"></div>
													</li> 
													
												</a>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								<!-- Vacancies -->
								<div role="tabpanel" class="tab-pane fade" id="samsa" aria-labelledby="samsa-tab">
									<div>
										<div id="container">
											<div class="view-controls-list" id="viewcontrols">
												<label>view :</label>
												<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
												<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
											</div>
											<div class="sort">
												<div class="sort-by">
													<label>Sort By : </label>
													<select>
														<option value="">Most recent</option>
														<option value="">Price: Rs Low to High</option>
														<option value="">Price: Rs High to Low</option>
													</select>
												</div>
											</div>
											<div class="clearfix"></div>
											<ul class="list">
													@foreach($poststype2 as $post)
												<a href="{{url('/single_ads/').$post->post_id}}">
												
													<li>
														<img src="{{url('/storage/uploades/default-image-620x600.jpg')}}" title="" alt="" />
														<section class="list-left">
															<h5 class="title">{{$post->post_title}}</h5>
															
															<p class="catpath">{{$post->post_phone}}</p>
														</section>
														<section class="list-right">
															<span class="date">{{$post->created_at}}</span>
															
														</section>
														<div class="clearfix"></div>
													</li> 
													
												</a>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								<ul class="pagination pagination-sm">
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">6</a></li>
									<li><a href="#">7</a></li>
									<li><a href="#">8</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<!-- // Products -->
	<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
    <script src="{{url('/')}}/websitetheme/js/tabs.js"></script>
	
<script type="text/javascript">
$(document).ready(function () {    
var elem=$('#container ul');      
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});						
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});									
		}
	});
});
</script>
	@endsection

