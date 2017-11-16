<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('assets/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/croppie.css') }}">
    <script src="{{ asset('assets/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/croppie.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/dm.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dropzone.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-right">
					<ul>
						<li><a href="#"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/') }}" target="_blank"><i class="fa fa-eye"></i> website</a></li>
						<li><a href="{{ url('dang-xuat') }}"><i class="fa fa-sign-out"></i> Đăng Xuất</a></li>
					</ul> 
				</div>
				<hr>
				<h3><a href="{{ url('quan-tri') }}"><i class="fa fa-home"></i></a> @yield('name')</h3>
				<hr>
				@yield('content')
			</div>
			<div class="modal-user">
				<div class="modal-user-body">
					
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	CKEDITOR.replace( 'noidung' );
	</script>
</body>
</html>