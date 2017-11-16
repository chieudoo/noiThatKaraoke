@extends('quantri.index')
@section('name','Edit User')
@section('content')
<div class="col-md-6 col-md-push-1">
	<div class="khong"></div>
	@include('flash.flash')
	@if(Auth::user()->id == $id)
	<form action="" method="POST" role="form">
		@foreach($data as $item)
		<legend>Sửa thành viên <i style="color: blue;font-size: 14px">{{ $item['name'] }}</i></legend>
		{{ csrf_field() }}
		<div class="form-group">
			<label>Họ và tên</label>
			<input type="text" name="name" class="form-control" value="{{ $item['name'] }}" placeholder="Input field">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" disabled class="form-control" value="{{ $item['email'] }}" placeholder="Input field">
		</div>
		<div class="form-group">
			<label>Mật khẩu mới</label>
			<input type="password" name="password" class="form-control" placeholder="Nhập một mật khẩu mới min 8 ky tu" required="required">
		</div>
		@endforeach

		

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>	
	@else
		@if(Auth::user()->id == 1)
		<form action="" method="POST" role="form">
			@foreach($data as $item)
			<legend>Sửa thành viên <i style="color: blue;font-size: 14px">{{ $item['name'] }}</i></legend>
			{{ csrf_field() }}
			<div class="form-group">
				<label>Họ và tên</label>
				<input type="text" name="name" readonly class="form-control" value="{{ $item['name'] }}" placeholder="Input field">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" readonly class="form-control" value="{{ $item['email'] }}" placeholder="Input field">
			</div>
			<div class="form-group">
				<label>Thay đổi trạng thái</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" value="0" checked="checked">
						Enable
					</label>
					<label>
						<input type="radio" name="status" value="1" >
						Disable
					</label>
				</div>
			</div>
			@endforeach

			

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>	
		@endif
	@endif
</div>
<div class="col-md-4"></div>
@endsection