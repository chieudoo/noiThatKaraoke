@extends('website.index')
@section('name','Sản Phẩm '.$title)
@section('content')
<div class="page">
	<div class="container">
		<div class="col-md-12">
	        <h1><i class="fa fa-ticket"></i> {{ $title }}</h1>
	        <div class="kengang"></div>
	    </div>
	    <div class="col-md-3">
	    	<h4 class="menu_title">Danh Mục Sản Phẩm</h4>
	    	<ul id="menu_item_sub_cat">
	    		@foreach($pcate as $item)
	    			@if($item['id'] == $id)
						<li><a href="{{ url('page/'.$item['id'].'/'.$item['slug']) }}" class="active">{{ $item['name'] }}</a></li>
					@else
						<li><a href="{{ url('page/'.$item['id'].'/'.$item['slug']) }}">{{ $item['name'] }}</a></li>
					@endif
	    		@endforeach
	    	</ul>
	    </div>
	    <hr>
	    <div class="col-md-9">
	    	@foreach($sp as $item)
	        <div class="col-md-4 col-sm-6">
	            <div class="i_sup">
	                <img src="{{ url('image/'.$item['image']) }}" class="img-responsive" alt="{{ $item['slug'] }}">
	                <h3>{{ $item['name'] }}</h3>
	                <div class="nd_i_sup">
	                    <h4>{{ $item['name'] }}</h4>
	                    <span><i>Upload by :</i> {{ $item['user']['name'] }}</span>
	                    <p>{!! $item['mota'] !!}</p>
	                    <a href="">Chi tiết</a>
	                </div>
	            </div>
	            <!-- end class i_sup -->
	        </div>
	        <!-- end mot cot -->
	        @endforeach
	    </div>
	</div>
</div>
@endsection
