@extends('quantri.index')
@section('name','Quản lý thông tin liên hệ')
@section('content')

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
						<label>Nội dung</label>
						<textarea name="noidung"></textarea>
					</div>
					<div class="form-group">
						<label>Logo</label>
						<input type="file" name="logo">
						<input type="hidden" name="acu">
					</div>
					<div class="form-group">
						<label>Link Facebook</label>
						<input type="text" class="form-control" placeholder="Input field">
					</div>
				
					
				
					<button type="submit" class="btn btn-primary sub_edit">Submit</button>
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
			<th>Nội dung</th>
			<th>Logo</th>
			<th>Facebook</th>
			<th>Quản lý</th>
		</tr>
	</thead>
	<tbody>
		<?php getLienhe($data) ?>
	</tbody>
</table>
@endsection