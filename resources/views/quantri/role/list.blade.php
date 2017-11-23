@extends('quantri.index')
@section('name','Role Management')
@section('content')
<div class="container">
	<div class="container">
	<div class="col-md-4 col-md-push-4">
		@include('flash.flash')
		<form action="" method="POST" role="form">
			<legend>Create new Role</legend>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<label>Chọn quyền</label>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="1" name="them">
					Thêm
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="1" name="sua">
					Sửa
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="1" name="xoa">
					Xóa
				</label>
			</div>
		
			
		
			<a type="submit" class="btn btn-primary create">Create</a>
		</form>
		<div class="khoang"></div>
		<span class="success"></span>
	</div>
	<div class="khoang"></div>

	<div class="col-md-12">
		<a href="{{ url('win-add-role') }}" class="btn btn-info">Add User To Role</a>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $item)
				<tr>
					<td>{{ $item['name'] }}</td>
					<td>{{ $item['role'] }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>

</div>
@endsection