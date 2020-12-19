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
						<h3 class="card-title">Users</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Type</th>
									<th>Created_at</th>
									<th>Processes</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{$user->user_id}}</td>
									<td>{{$user->user_name}}</td>
									<td>{{$user->user_email}}</td>
									<td>{{$user->user_phone}}</td>
									<td>{{$user->user_type_id}}</td>
									<td>{{$user->created_at}}</td>
									<td>
										<button type="button" class="btn btn-danger">
											<a onclick="return confirm('are you shore')"  style="color: white;" href="{{url('/deleteuser').'/'.$user->user_id}}">Delete</a>
										</button>

										<button type="button" class="btn btn-primary">
											<a style="color: white;" href="">Edit</a>
										</button>
									</td>

									
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Type</th>
									<th>Created_at</th>
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
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection