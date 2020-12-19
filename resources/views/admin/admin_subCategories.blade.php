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
						<h3 class="card-title">SubCategorie</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>SubCategorie</th>
									<th>Created_at</th>
									<th>Categorie</th>
									<th>Processes</th>
								</tr>
							</thead>
							<tbody>
								@foreach($subcategories as $subcategorie)
								<tr>
									<td>{{$subcategorie->sub_id}}</td>
									<td>{{$subcategorie->sub_name}}</td>
									<td>{{$subcategorie->created_at}}</td>
									<td>{{$subcategorie->categ_name}}</td>
									<td>
										<button type="button" class="btn btn-danger">
											<a onclick="return confirm('are you shore')"  style="color: white;" href="{{url('/deletesubcategorie').'/'.$subcategorie->sub_id}}">Delete</a>
										</button>

										<button type="button" class="btn btn-primary">
											<a style="color: white;" href="{{url('/editesubcategorie').'/'.$subcategorie->sub_id}}">Edit</a>
										</button>
									</td>
								</tr>
								

								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>SubCategorie</th>
									<th>Created_at</th>
									<th>Categorie</th>
									<th>Processes</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
			<div class="col-12">
				<form action="{{url('/addSubCategorie')}}" class="categorie-frm" role="form" method="POST">
					{{csrf_field()}}

					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">SubCategorie Name</label>
							<input type="text" class="form-control" name="subcategoriename" id="exampleInputEmail1" placeholder="Add Name">
						</div>
						<div class="form-group">
							<label>Categorie</label>
							<select class="form-control select2" name="selectcategorie" style="width: 100%;">
								<option selected="selected">chosess...</option>
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
						<button type="submit" class="btn btn-primary">Add Categoire</button>
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