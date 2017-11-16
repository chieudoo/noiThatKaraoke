@extends('quantri.index')
@section('name','Trang Chủ Quản Trị Viên')
@section('content')
	<div class="col-md-8 col-md-push-2">
		<div class="main">
			<div class="col-md-12">
				<div class="top_main">
				
				</div>
				<hr>
				<!-- end class top_main -->
			</div>
			
			<div class="col-md-3 col-sm-6">
				<div class="cot">
					<h1>Danh Mục</h1>
					<a href="{{ url('win-danh-muc') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot" style="background: #3ee83e">
					<h1>Công Trình</h1>
					<a href="{{ url('win-cong-trinh') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot" style="background: #e03737e8">
					<h1>Tư Vấn</h1>
					<a href="{{ url('win-tu-van') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot">
					<h1>Sản Phẩm Karaoke</h1>
					<a href="{{ url('win-san-pham') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot" style="background: #4a8bde">
					<h1>Giới Thiệu</h1>
					<a href="{{ url('win-gioi-thieu') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot" style="background: #c5d21d">
					<h1>Slide</h1>
					<a href="{{ url('win-slide') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot" style="background: #e0a213e8">
					<h1>Liên Hệ</h1>
					<a href="{{ url('win-lien-he') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="cot" style="background: #4a8bde">
					<h1>Users</h1>
					<a href="{{ url('win-user') }}">Chi tiết <i class="fa fa-caret-right"></i></a>
				</div>
				<!-- end class cot -->
			</div>

		</div>
		<!-- end class main -->
	</div>
@endsection