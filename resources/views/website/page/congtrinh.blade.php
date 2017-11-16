@extends('website.index')
@section('name','Các Công Trình Đã Thi Công')
@section('content')
<div class="page">
	<div class="container">
		<div class="col-md-12">
	        <h1><i class="fa fa-ticket"></i> {{ $title }}</h1>
	        <div class="kengang"></div>
	    </div>
	    @foreach($congtrinh as $item)
        <div class="col-md-4 col-sm-6">
            <div class="item">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{ $item['link'] }}" frameborder="0" allowfullscreen></iframe>
                <div class="nd_item">
                    <h2>{{ $item['name'] }}</h2>
                    <span><i>Upload By : </i> {{ $item['user']['name'] }}</span>
                    <p>{!! $item['noidung'] !!}</p>
                    <a href="{{ url('chi-tiet-cong-trinh/'.$item['slug'].'/'.$item['id']) }}">Chi tiết</a>
                </div>
            </div>
            <!-- end class item -->
        </div>
        <!-- end cot mot -->
        @endforeach
	</div>
</div>
@endsection