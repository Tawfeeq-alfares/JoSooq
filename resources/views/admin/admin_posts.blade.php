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
			
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Users</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped responsive">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Description</th>
									<th>User Name</th>
									<th>User Phone</th>
									<th>User Email</th>
									<th>Updated at</th>
									<th>Created at</th>
								</tr>
							</thead>
							<tbody>
								@foreach($posts as $post)
								<tr>
									<td>{{$post->post_id}}</td>
									<td>{{$post->post_title}}</td>
									<td>{{$post->post_description}}</td>
									<td>{{$post->post_name}}</td>
									<td>{{$post->post_phone}}</td>
									<td>{{$post->post_email}}</td>
									<td>{{$post->updated_at}}</td>
									<td>{{$post->created_at}}</td>
									<td>
										<button type="button" class="btn btn-danger">
											<a onclick="return confirm('are you shore')"  style="color: white;" href="{{url('/deletepost').'/'.$post->post_id}}">Delete</a>
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
									<th>Title</th>
									<th>Description</th>
									<th>User Name</th>
									<th>User Phone</th>
									<th>User Email</th>
									<th>Updated at</th>
									<th>Created at</th>
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