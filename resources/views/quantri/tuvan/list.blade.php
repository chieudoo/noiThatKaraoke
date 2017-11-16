@extends('quantri.index')
@section('name','Quản Lý Tư Vấn')
@section('content')
<a class="btn btn-primary add" data-click="add" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Plus</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
				
					<div class="form-group"> 
						<labe>Danh Mục</label>
						<select name="cat_id" class="form-control">
							<?php 
								foreach ($cate as $item) {
									echo "<option value='".$item['id']."'>".$item['name']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<labe>Tiêu Đề</label>
						<input type="text" name="name" class="form-control" placeholder="Vui long nhập">
						<input type="hidden" name="user">
					</div>
					<div class="form-group">
						<labe>Mô Tả</label>
						<textarea class="form-control" name="mota" cols="5" rows="5"></textarea>
					</div>
					<div class="form-group">
						<labe>Nội Dung</label>
						<textarea class="form-control" name="noidung"></textarea>
					</div>
					<div class="form-group">
						<label>Ảnh Minh Họa</label>
						<input type="file" name="image" >
						<input type="hidden" name="img">
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
			<th>Tiêu Đề</th>
			<th>Ảnh Minh Họa</th>
			<th>Danh Mục</th>
			<th>Trạng Thái</th>
			<th>Quản Lý</th>
		</tr>
	</thead>
	<tbody>
		<?php getTu($data) ?>
	</tbody>
</table>

@endsection