@extends('quantri.index')
@section('name','Add user to role')
@section('content')
<div class="container">
	<div class="row">
			<div class="col-md-4 col-md-push-4">
				<form method="POST" role="form">
					<div class="form-group">
						<label>User Role</label>
						<select name="role_id" class="form-control" required="required">
							<option value="">-- Chọn --</option>
							@foreach($data as $item)
							<option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Add User</label>
						<select name="user_id" class="form-control" required="required">
							<option value="">-- Chon --</option>
							@foreach($user as $item)
							<option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
							@endforeach
						</select>
					</div>
						

					<button type="submit" class="btn btn-primary add_user_role" >Add</button>
				</form>

				<div class="khoang"></div>
				<span class="success"></span>
			</div>
		
	</div>
</div>
@endsection