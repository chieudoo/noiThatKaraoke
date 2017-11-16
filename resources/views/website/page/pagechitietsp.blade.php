@extends('website.index')
@section('name',$name)
@section('content')
<div class="sanpham">
	<div class="container">
		<div class="col-md-12">
			<h3>{{ $name }}</h3>
			<p>Đăng bởi :<span> Aloha</span> - ngày : <i>12/12/12</i></p>
		</div>
		<div class="col-md-9 col-sm-9">
			@foreach($sp as $item)
			<p>{!! $item['noidung'] !!}</p>
			@endforeach
		</div>
		<div class="col-md-3 col-sm-3">
			<h4>Có thể bạn quan tâm</h4>
			@foreach($ransp as $item)
			<div class="item">
				<img src="{{ url('image/'.$item['image']) }}">
				<h5>{{ $item['name'] }}</h5>
				<a class="btn btn-default" href="{{ url('chi-tiet-san-pham/'.$item['slug'].'/'.$item['id']) }}" role="button">Chi tiết</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection