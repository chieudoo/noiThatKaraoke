@extends('quantri.index')
@section('name','Giới Thiệu Về Chúng Ta')
@section('content')
<!-- <a class="btn btn-primary add" data-click="add" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"> Plus</i></a> -->
<div class="modal fade" id="modal-id">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form">
				
					<div class="form-group">
						<label>Link Youtube</label>
						<input type="text" class="form-control" name="link" placeholder="Input field">
					</div>
					<div class="form-group">
						<label>Nội Dung</label>
						<textarea name="noidung"></textarea>
					</div>
				
					
				
					<button type="submit" class="btn btn-primary sub_edit">Edit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
			<div class="modal-footer" style="overflow: hidden;text-align: center;">
				<span class="success"><i class="fa fa-check" style="color: green;font-size: 20px"> Success</i></span>
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
			<th>Link</th>
			<th>Nội Dung</th>
			<th>Quản Lý</th>
		</tr>
	</thead>
	<tbody>
		<?php getGT($data); ?>
	</tbody>
</table>
@endsection