<!DOCTYPE html>
<html>
<head>
	<title>Auth</title>
	<link rel="stylesheet" href="{{url('/')}}/websitetheme/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/websitetheme/css/bootstrap-select.css">
	<link href="{{url('/')}}/websitetheme/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!--fonts-->
	<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->	
	<!-- js -->
	<script type="text/javascript" src="{{url('/')}}/websitetheme/js/jquery.min.js"></script>
	<!-- js -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{url('/')}}/websitetheme/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/websitetheme/js/bootstrap-select.js"></script>
	<script>
		$(document).ready(function () {
			var mySelect = $('#first-disabled2');

			$('#special').on('click', function () {
				mySelect.find('option:selected').prop('disabled', true);
				mySelect.selectpicker('refresh');
			});

			$('#special2').on('click', function () {
				mySelect.find('option:disabled').prop('disabled', false);
				mySelect.selectpicker('refresh');
			});

			$('#basic2').selectpicker({
				liveSearch: true,
				maxOptions: 1
			});
		});
	</script>
	<script type="text/javascript" src="{{url('/')}}/websitetheme/js/jquery.leanModal.min.js"></script>
	<link href="{{url('/')}}/websitetheme/css/jquery.uls.css" rel="stylesheet"/>
	<link href="{{url('/')}}/websitetheme/css/jquery.uls.grid.css" rel="stylesheet"/>
	<link href="{{url('/')}}/websitetheme/css/jquery.uls.lcd.css" rel="stylesheet"/>
	<!-- Source -->
	<script src="{{url('/')}}/websitetheme/js/jquery.uls.data.js"></script>
	<script src="{{url('/')}}/websitetheme/js/jquery.uls.data.utils.js"></script>
	<script src="{{url('/')}}/websitetheme/js/jquery.uls.lcd.js"></script>
	<script src="{{url('/')}}/websitetheme/js/jquery.uls.languagefilter.js"></script>
	<script src="{{url('/')}}/websitetheme/js/jquery.uls.regionfilter.js"></script>
	<script src="{{url('/')}}/websitetheme/js/jquery.uls.core.js"></script>
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
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.html"><span>Careers</span>Ads</a>
			</div>
			<div class="header-right">
				@if(session()->has('admin')||session()->has('guest'))
				<a style="margin-right: 10px;" class="account" href="{{url('/logout')}}">logout</a>
				@endif
				<a class="account" href="login.html">My Account</a>
				<span class="active uls-trigger">Select language</span>
				<!-- Large modal -->
				
		</div>
	</div>
</div>
<section>

	<!-- Main content -->
	@yield('content')
	<!-- /.content -->

	
	<!--footer section start-->
	<footer class="diff">
		<p class="text-center">&copy 2016 Resale. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
	</footer>
	<!--footer section end-->
</section>
</body>
</html>