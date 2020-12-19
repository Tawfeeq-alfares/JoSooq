@extends('layouts.webmain')
@section('content')

<?php
/*
$countcategories = App\Categorie::count();
$posts = App\Post::where('categ_id','=','1')->get();

$countposts = App\Post::where('categ_id','=','1')->get()->count();
*/

$subcateg = App\subcategorie::where('categ_id','=','1')->get();
?>
<!-- Categories -->
<!--Vertical Tab-->
<div class="categories-section main-grid-border">
	<div class="container">
		<h2 class="head">Main Categories</h2>
		<div class="category-list">
			<div id="parentVerticalTab">
				<ul class="resp-tabs-list hor_1 ul">
					@foreach($categories as $categorie)
					<li class="li" id="{{$categorie->categ_id}}" onclick="allsub(this)">{{$categorie->categ_name}}</li>
					@endforeach
					<a href="all-classifieds.html">All Ads</a>
				</ul>
				<div class="resp-tabs-container hor_1">
					<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>All USA</strong> (Select your city to see local ads)</span>
					@foreach($categories as $categorie)
					<div>
						<div class="category">
							<div class="category-img">
								@if($categorie->categ_image=='')
								<img src="{{url('/storage/uploades/default-image-620x600.jpg')}}" title="image" alt="" 
								/>
								@else
								<img style="width: 100px;height: 100px" src="{{url('/storage/uploades/')}}/{{$categorie->categ_image}}" title="image" alt="" 
								/>
								@endif
							</div>
							<div class="category-info">
								<h4>{{$categorie->categ_name}}</h4>
								<span>{{App\Post::where('categ_id','=',$categorie->categ_id)->get()->count()}}</span>
								<a href="{{url('/all_ads').'/'.$categorie->categ_id}}">View all Ads</a>

							</div>
							<div class="clearfix"></div>
						</div>
						<div class="sub-categories">
							<ul class="sub">
								@foreach($education as $edu)
								<li><a href="mobiles.html">{{$edu->sub_name}}</a></li>
								@endforeach
								<div class="clearfix"></div>
							</ul>
						</div>
					</div>
					@endforeach
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--Plug-in Initialisation-->
<script type="text/javascript">
	  var url = $('meta[name=base_url]').attr("content");
  var csrf_token = $('meta[name=csrf_token]').attr("content");
	$(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
            	var $tab = $(this);
            	var $info = $('#nested-tabInfo2');
            	var $name = $('span', $info);
            	$name.text($tab.text());
            	$info.show();
            }
        });
    });


   

  function allsub(e){

    var id = e.id;
   
    $.ajax({
      type:'POST',
      url: url+'/subcatigories',
      data:{

        id:id,
         _token:csrf_token
      },
      success:function(response){
        if (response.status == true) {
        
         $('.sub').empty();
        //console.log(response.subcategories[i].sub_name);
        for (var i = response.subcategories.length - 1; i >= 0; i--) {
        	$('.sub').append('<li><a href="mobiles.html">'+ response.subcategories[i].sub_name +'</a></li>');
        }


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


   
  }
</script>
<!-- //Categories -->
@endsection