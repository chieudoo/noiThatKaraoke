@extends('quantri.index')
@section('name','Quản Lý Slide')
@section('content')
<a class="btn btn-primary add" data-click="add" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"> Plus</i></a>
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
						<label>Tiêu Đề</label>
						<input type="text" class="form-control" name="name" placeholder="Input field">
					</div>
					<div class="form-group">
						<label>Nội Dung</label>
						<textarea name="noidung"></textarea>
					</div>
					<div class="form-group">
						<label>Hình Ảnh</label>
						<input type="file" name="image">
						<input type="hidden" name="anhcu">
						<img src="" class="demo-img">
						
						<div id="upload-demo" style="width:350px;"></div>

					</div>
					<div class="form-group">
						<label>Trạng Thái</label>
						<div class="radio">
							<label>
								<input type="radio" name="status" value="0" checked="checked">
								Enable
							</label>
							<label>
								<input type="radio" name="status" value="1">
								Disable
							</label>
						</div>
					</div>
					
				
					<button type="submit" class="btn btn-primary sub_add">Add</button>
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
			<th>Ảnh Slide</th>
			<th>Trạng Thái</th>
			<th>Quản Lý</th>
		</tr>
	</thead>
	<tbody>
		<?php getSlide($data) ?>
	</tbody>
</table>
@endsection