@extends('website.index')
@section('name','Tư vấn thiết kế karaoke')
@section('content')
<div class="page">
	<div class="container">
		<div class="col-md-12">
	        <h1><i class="fa fa-ticket"></i> {{ $title }}</h1>
	        <div class="kengang"></div>
	    </div>
		@foreach($thicong as $item)
		@if($item['status'] == 0)
        <div class="col-md-3 col-sm-6">
            <div class="i_sup">
                <img src="{{ url('image/upload/'.$item['image']) }}" class="img-responsive" alt="{{ $item['slug'] }}">
                <h3>{{ $item['name'] }}</h3>
                <div class="nd_i_sup">
                    <h4>{{ $item['name'] }}</h4>
                    <span><i>Upload by :</i> {{ $item['user']['name'] }}</span>
                    <p><i>Tư vấn :</i> {{ $item['cat']['name'] }}</p>
                    <p>{!! $item['mota'] !!}</p>
                    <a href="{{ url('tu-van-chi-tiet/'.$item['slug'].'/'.$item['id']) }}">Chi tiết</a>
                </div>
            </div>
            <!-- end class i_sup -->
        </div>
        <!-- end mot cot -->
        @endif
        @endforeach
        <div class="col-md-12">
        	{{
        		$thicong->render()
        	}}
        </div>
	</div>
</div>
@endsection