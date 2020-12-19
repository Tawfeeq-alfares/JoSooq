@extends('layouts.webmain')
@section('content')
<!-- Terms of use -->
<div class="contact main-grid-border">
	<div class="container">
		<h2 class="head text-center">Contact Us</h2>
		<section id="hire">    
			<form action="{{url('/massege')}}" method="POST" id="filldetails">
				{{csrf_field()}}
				@foreach ($errors->all() as $error)
						<div class="alert alert-danger">

							<li>{{ $error }}</li>
						</div>
						@endforeach
				<div class="field name-box">
					<input type="text" id="name" name="namemsg" placeholder="Who Are You?"/>
					<label for="name">Name</label>
					<span class="ss-icon">check</span>
				</div>
				
				<div class="field email-box">
					<input type="text" id="email" name="emailmsg" placeholder="example@email.com"/>
					<label for="email">Email</label>
					<span class="ss-icon">check</span>
				</div>
				
				<div class="field phonenum-box">
					<input type="text" id="email" name="phonemsg" placeholder="Phone Number"/>
					<label for="email">Phone</label>
					<span class="ss-icon">check</span>
				</div>

				<div class="field msg-box">
					<textarea id="msg" rows="4" name="textmsg" placeholder="Your message goes here..."/></textarea>
					<label for="msg">Your Msg</label>
					<span class="ss-icon">check</span>
				</div>

				<div class="upload">

					<input class="button " type="submit" value="Send" />

				</div>
			</form>
		</section>

		
		<!-- JavaScript Includes -->
		<script src="{{url('/')}}/websitetheme/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="{{url('/')}}/websitetheme/js/jquery.ui.widget.js"></script>
		<script src="{{url('/')}}/websitetheme/js/jquery.fileupload.js"></script>

		<!-- Our main JS file -->
		<script src="{{url('/')}}/websitetheme/js/script.js"></script>
		<script>
			$('textarea').blur(function () {
				$('#hire textarea').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('textarea + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('textarea + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:first-child input').blur(function () {
				$('#hire .field:first-child input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(2) input').blur(function () {
				$('#hire .field:nth-child(2) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(3) input').blur(function () {
				$('#hire .field:nth-child(3) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(4) input').blur(function () {
				$('#hire .field:nth-child(4) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
		  //@ sourceURL=pen.js
		</script>    
		<script>
			if (document.location.search.match(/type=embed/gi)) {
				window.parent.postMessage("resize", "*");
			}
		</script>
	</div>	
</div>
<!-- // Terms of use -->
@endsection