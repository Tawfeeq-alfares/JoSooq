@extends('layouts.adminmain')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Ubdate Categorie</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">DataTables</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	

	<!-- Main content -->
	<section class="content">

		<div class="row">
			@if(Session::has('success'))
			<div class="col-12">
				<div class="alert alert-danger">

					<li>{{ Session::get('success') }}</li>
				</div>
			</div>
			@endif
			

			<div class="col-12" >
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Ubdate Categorie</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="{{ url('/ubdateCategorie/' . $categorie->categ_id)}}" class="ubdatecategorie" role="form" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Categorie Name</label>
								<input type="text" class="form-control" name="updatecategname" value="{{$categorie->categ_name}}" id="exampleInputEmail1" placeholder="Add Name">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Categoire Image</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="updatecategimage" id="exampleInputFile">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
									
								</div>
							</div>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Check me out</label>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Add Categoire</button>
						</div>
					</form>
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop

@section('script')

<script>

	var url = $('meta[name=base_url]').attr("content");
	var csrf_token = $('meta[name=csrf_token').attr("content");

	$('.ubdatecategorie-frm').on('submit',function(e){

		var formData = new FormData(this);
		formData.append('_token',csrf_token);

		$.ajax({
			type:'POST',
			url: url+'/ubdateCategorie/{categ_id}',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success:function(response){
				if (response.status == true) {
					console.log("ok");
				}
			},
			error: function(xhr){
				console.log(xhr.responseText);
			}
		});
		e.preventDefault();
	});
</script>
@stop