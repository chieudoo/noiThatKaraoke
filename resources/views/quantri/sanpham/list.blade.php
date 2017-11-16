@extends('quantri.index')
@section('name','Quản Lý Sản Phẩm Karaoke')
@section('content')
<a class="btn btn-primary add" data-toggle="modal" data-click="add" href='#modal-id'><i class="fa fa-plus"> Plus</i></a>
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
						<label>Danh Mục</label>
						<select name="cat" class="form-control">
							<?php 
								foreach ($cat as $item) {
									echo "<option value='".$item['id']."'>".$item['name']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tên Sản Phẩm</label>
						<input type="text" name="name" class="form-control" placeholder="Vui long nhap">
					</div>
					<div class="form-group">
						<label>Mô Tả</label>
						<textarea name="mota" class="form-control" cols="5" rows="5"></textarea>
					</div>
					<div class="form-group">
						<label>Chi Tiết Sản Phẩm</label>
						<textarea name="noidung" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Ảnh Hiển Thị</label>
						<input type="file" name="image">
						<input type="hidden" name="anhcu">
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
			<th>Tên Sản Phẩm</th>
			<th>Ảnh Minh Họa</th>
			<th>Thuộc Danh Mục</th>
			<th>Trạng Thái</th>
			<th>Quản Trị</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			getSan($data);
		 ?>
	</tbody>
</table>
@endsection