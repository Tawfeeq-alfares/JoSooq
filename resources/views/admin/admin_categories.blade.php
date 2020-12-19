@extends('layouts.adminmain')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>User Management</h1>
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
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Categories</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Categorie</th>
									<th>Image</th>
									<th>Created_at</th>
									<th>Processes</th>
									<th>Posts</th>
								</tr>
							</thead>
							<tbody>

								@foreach($categories as $categorie)
								<tr>
									<td>{{$categorie->categ_id}}</td>
									<td>{{$categorie->categ_name}}</td>
									@if($categorie->categ_image=='')
									<td><img src="{{url('/storage/uploades/default-image-620x600.jpg')}}" style="height: 100px;width: 100px;"></td>
									@else
									<td><img src="{{url('/storage/uploades/')}}/{{$categorie->categ_image}}" style="height: 100px;width: 100px;"></td>
									@endif
									<td>{{$categorie->created_at}}</td>

									<td>
										<button type="button" class="btn btn-danger">
											<a onclick="return confirm('are you shore')"  style="color: white;" href="{{url('/deletecategorie').'/'.$categorie->categ_id}}">Delete</a>
										</button>

										<button type="button" class="btn btn-primary">
											<a style="color: white;" href="{{url('/editcategorie').'/'.$categorie->categ_id}}">Edit</a>
										</button>
									</td>

									<td>
										<button type="button" class="btn btn-success">
											<a  style="color: white;" href="{{url('/showposts').'/'.$categorie->categ_id}}">Posts</a>
										</button>

									</td>

									
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Categorie</th>
									<th>Image</th>
									<th>Created_at</th>
									<th>Processes</th>
									<th>Posts</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->

			<div class="col-12" >
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Add Categorie</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form class="categorie-frm" role="form" method="POST" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Categorie Name</label>
								<input type="text" class="form-control" name="categoriename" id="exampleInputEmail1" placeholder="Add Name">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Categoire Image</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="categorieimage" id="exampleInputFile">
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

	$('.categorie-frm').on('submit',function(e){

		var formData = new FormData(this);
		formData.append('_token',csrf_token);

		$.ajax({
			type:'POST',
			url: url+'/addCategorie',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success:function(response){
				if (response.status == true) {
					$('.img-holder').append('<img src="<?php echo asset('storage/uploades') ?>/'+response.categ_image.categ_image+'"/>');
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