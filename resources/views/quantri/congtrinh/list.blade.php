@extends('quantri.index')
@section('name','Quản Lý Công Trình')
@section('content')

@if(Auth::user()->id==1)
<a class='btn btn-primary add' data-click='add' data-toggle='modal' href='#modal-id'><i class='fa fa-plus'></i> Plus</a>
@else
<?php 
	QuyenAdd($quyen, Auth::user()->id)
?>
@endif
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
						<input type="hidden" name="user">
					</div>
					<div class="form-group">
						<label>Mô Tả</label>
						<textarea class="form-control" name="text" cols="5" rows="5" maxlength="255"></textarea>
					</div>
					<div class="form-group">
						<label>Nội Dung</label>
						<textarea class="form-control" name="noidung"></textarea>
					</div>
					<div class="form-group">
						<label>Link Video</label>
						<input type="text" class="form-control" name="link" placeholder="Input field">
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
			<div class="modal-footer" style="overflow: hidden;">
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
			<th>STT</th>
			<th>Tiêu Đề</th>
			<th>Link Video</th>
			<th>Trạng Thái</th>
			<th>Quản Lý</th>
		</tr>
	</thead>
	<tbody>
		<?php getCong($data) ?>
	</tbody>
</table>
@endsection