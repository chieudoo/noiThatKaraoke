@extends('website.index')
@section('name',$name)
@section('content')
<div class="sanpham">
	<div class="container">
		<div class="col-md-12">
			<h1>{{ $name }}</h1>
		</div>
		<div class="col-md-9 col-sm-9">
			@foreach($tuvan as $item)
			<p>{!! $item['noidung'] !!}</p>
			@endforeach
		</div>
		<div class="col-md-3 col-sm-3">
			<h4>Có thể bạn quan tâm</h4>
		@foreach($rantv as $item)
			<div class="item">
				<img src="{{ url('image/upload/'.$item['image']) }}">
				<h5>{{ $item['name'] }}</h5>
				<a class="btn btn-default" href="{{ url('tu-van-chi-tiet/'.$item['slug'].'/'.$item['id']) }}" role="button">Chi tiết</a>
			</div>
		@endforeach
		</div>
	</div>
</div>
@endsection