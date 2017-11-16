@extends('website.index')
@section('name','Thông tin liên hệ của chúng tôi')
@section('content')
<div class="page">
	<div class="container">
		<div class="col-md-12">
	        <h1><i class="fa fa-ticket"></i> {{ $title }}</h1>
	        <div class="kengang"></div>
	    </div>
	    @foreach($lienhe as $item)
        <div class="col-md-4 col-sm-6">
            {!! $item['noidung'] !!}
        </div>
        @endforeach
        <div class="col-md-6 col-md-push-1 col-sm-6">
        	<form action="" method="POST" role="form">
        		<legend>Gửi liên hệ</legend>
        	
        		<div class="form-group">
        			<label>Họ tên</label>
        			<input type="text" class="form-control"  placeholder="Input field">
        		</div>
        		<div class="form-group">
        			<label>Email</label>
        			<input type="text" class="form-control"  placeholder="Input field">
        		</div>
        		<div class="form-group">
        			<label>Nội dung</label>
        			<textarea cols="5" rows="5" class="form-control"></textarea>
        		</div>
        	
        		
        	
        		<button type="submit" class="btn btn-primary">Submit</button>
        	</form>
        </div>
        <!-- end cot mot -->

	</div>
</div>
@endsection