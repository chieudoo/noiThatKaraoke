@extends('website.index')
@section('name','Cao Lỗ - Thiết kế nội thất Karaoke')
@section('content')
    <div class="slider">
        <div class="container">
            <div class="col-md-12">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                	<?php slide($slide); ?>
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>


        </div>
        </div>
    </div>
    <!-- end class slider -->
    

    <div class="main">
        <div class="about">
            <div class="container">
                	@foreach($gioithieu as $item)
                <div class="col-md-6">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $item['link'] }}" frameborder="0" allowfullscreen></iframe>
                </div>
                    @endforeach
                <div class="col-md-6">
                	@foreach($gioithieu as $item)
                    <h1>Về Chúng Tôi</h1>
                    <hr>
                    <p><i>{!! $item['noidung'] !!}</i></p>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end class about -->
        <!-- <hr> -->
        <div class="building">
            <div class="container">
                <div class="col-md-12">
                    <h1><i class="fa fa-building"></i> Công Trình</h1>
                    <div class="kengang"></div>
                </div>
                @foreach($congtrinh as $item)
                <div class="col-md-4">
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
        <!-- end class building -->

        <div class="support">
            <div class="container">
                <div class="col-md-12">
                    <h1><i class="fa fa-ticket"></i> Tư Vấn</h1>
                    <div class="kengang"></div>
                </div>
                @foreach($tuvan as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="i_sup">
                        <img src="{{ url('image/upload/'.$item['image']) }}" class="img-responsive" alt="{{ $item['slug'] }}">
                        <h3>{{ $item['name'] }}</h3>
                        <div class="nd_i_sup">
                            <h4>{{ $item['name'] }}</h4>
                            <span><i>Upload by :</i> {{ $item['user']['name'] }}</span>
                            <p><i>Tư vấn :</i> {{ $item['cat']['name'] }}</p>
                            <p>{!! $item['mota'] !!} lo</p>
                            <a href="{{ url('tu-van-chi-tiet/'.$item['slug'].'/'.$item['id']) }}">Chi tiết</a>
                        </div>
                    </div>
                    <!-- end class i_sup -->
                </div>
                <!-- end mot cot -->
                @endforeach
            </div>
        </div>
        <!-- end class support -->
    </div>
    <!-- end class main -->
@endsection