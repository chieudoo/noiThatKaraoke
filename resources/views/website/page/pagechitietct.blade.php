@extends('website.index')
@section('name',$name)
@section('content')
<div class="sanpham">
	<div class="container">
		<div class="col-md-12">
			<h1>{{ $name }}</h1>
		</div>
		<div class="col-md-6">
			@foreach($congtrinh as $item)
			<iframe width="100%" height="400px" src="https://www.youtube.com/embed/{{ $item['link'] }}" frameborder="0" allowfullscreen></iframe>
			<hr>
			@endforeach
		</div>
		<div class="col-md-6">
			@foreach($congtrinh as $item)
			<span><i>Upload By : </i> {{ $item['user']['name'] }}</span>
			<p>{!! $item['noidung'] !!}</p>
			@endforeach
		</div>
	</div>
</div>
@endsection