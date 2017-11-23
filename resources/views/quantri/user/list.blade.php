@extends('quantri.index')
@section('name','Users Manager')
@section('content')
@if(Auth::user()->id == 1)
<a class="btn btn-primary add" data-click="add" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Plus</a>
<a href="{{ url('win-create-role') }}" class="fa fa-info"> Phân quyền</a>
@endif
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				
				<form method="POST" role="form">
				
					<div class="form-group">
						<label>Họ và tên</label>
						<input type="text" name="name" class="form-control" placeholder="Input field">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Input field">
					</div>
					<div class="form-group">
						<label>Mật khẩu</label>
						<input type="password" name="password" class="form-control" placeholder="Input field">
					</div>
				
					
				
					<button type="submit"  class="btn btn-primary sub_add">Add</button>
					<button type="submit" class="btn btn-primary sub_edit">Edit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
			<div class="modal-footer" style="text-align: center;overflow: hidden;">
				<span class="success"></span>
				<div class="kengang"></div>
			</div>
		</div>
	</div>
</div>
<div class="khoang"></div>
@include('flash.flash')
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Quản lý</th>
		</tr>
	</thead>
	<tbody>
		<?php getUser($data) ?>
	</tbody>
</table>
@endsection