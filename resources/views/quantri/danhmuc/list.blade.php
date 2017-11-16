@extends('quantri.index')
@section('name','Quản Lý Danh Mục')
@section('content')

<!-- <a class="btn btn-info add" data-click="add" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> PLUS</a> -->
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thêm Danh Mục</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Tên Danh Mục</label>
						<input type="text" class="form-control" required name="name" placeholder="Nhập tên danh mục">
					</div>
					<div class="form-group">
						<label>Thuộc Cấp</label>
						<select name="parent" class="form-control" >
							<option value="0">-- ROOT --</option>
							<?php selCate($data,0,"-- ") ?>
						</select>
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
				<span class="success"><i class="fa fa-check" style="color: green;font-size: 20px"> Success</i></span>
				<div class="kengang"></div>
			</div>
		</div>
	</div>
</div>

<div class="khoang"></div>
@include('flash.flash')

<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Tên Danh Mục</th>
				<th>Slug</th>
				<th>Trạng Thái</th>
				<th>Quản Lý</th>
			</tr>
		</thead>
		<tbody>
			<?php getCate($data,0,"--") ?>
		</tbody>
	</table>
</div> 
@endsection