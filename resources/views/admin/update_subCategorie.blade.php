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
			
			<!-- /.col -->
			<div class="col-12">
				<form action="{{url('/ubdateSubcategorie/'.$subcategorie->sub_id)}}" class="categorie-frm" role="form" method="POST">
					{{csrf_field()}}

					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">SubCategorie Name</label>
							<input type="text" class="form-control" name="subcategoriename" value="{{$subcategorie->sub_name}}" id="exampleInputEmail1" placeholder="Add Name">
						</div>
						<div class="form-group">
							<label>Categorie</label>
							<select class="form-control select2" name="selectcategorie" style="width: 100%;">
								<option selected="selected">{{$subcategorie->categ_name}}</option>
								@foreach($categories as $categorie)
								<option>{{$categorie->categ_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Update SubCategoire</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection