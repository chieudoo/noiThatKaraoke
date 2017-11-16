@extends('website.index')
@section('name','Giới Thiệu Về Chúng Tôi')
@section('content')
<div class="page">
	<div class="container">
		
		<h1><i class="fa fa-users" style="color: green"></i> giới thiệu về chúng tôi</h1>
		
		@foreach($gioithieu as $item)
		<div class="col-md-6">
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $item['link'] }}" frameborder="0" allowfullscreen></iframe>
		</div>
		@endforeach
		<div class="col-md-12">
			@foreach($gioithieu as $item)
            <!-- <h1>Về Chúng Tôi</h1> -->
            <hr>
            <p><i>{!! $item['noidung'] !!}</i></p>
            @endforeach
		</div>
	</div>
	
</div>
@endsection