@extends('quantri.index')
@section('name','Role Management')
@section('content')
<div class="container">
	<div class="col-md-2">
		<label>Người dùng</label>
		<select name="user" class="form-control">
			<option value="">Chọn người dùng</option>
			<?php listUser($data) ?>
		</select>
	</div>
	<div class="col-md-10">
		<label>Chọn quyền</label>
		<form action="" method="POST" role="form">
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

			<button type="submit" class="btn btn-primary create">Create</button>
		</form>
		<div class="modal-footer" style="text-align: center;overflow: hidden;">
			<span class="success"></span>
			<div class="kengang"></div>
		</div>
	</div>
</div>
@endsection