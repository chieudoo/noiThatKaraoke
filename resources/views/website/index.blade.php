<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('name')</title>
    <!-- Latest compiled and minified CSS & JS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/1.css') }}">
    <script type="text/javascript" src="{{ asset('assets/1.js') }}"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div class="phone">
        <a href="callto:0984158658"><i class="fa fa-phone fa-2x"></i></a>
    </div>

    <div class="menu">
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        @foreach($lienhe as $item)
                        <h1 class="logo"><img src="{{ url('image/logo/'.$item['logo'] )}}"></h1>
                        @endforeach
                    </div>
                    <div class="col-md-10">
                        <form class="navbar-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                                <div class="hien_denghi">
                                    <ul></ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--  end class top_menu -->
        <div class="bot_menu">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">TRANG CHỦ</a>
                    </div>
            
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        
                        <ul class="nav navbar-nav navbar-left">
                            <?php menu($cate,0) ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href=""><i class="fa fa-phone"></i> 0984.158.658</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
                <!--  end navbar -->
        </div>
        <!--  end class bot_menu -->

    </div> 
    <!-- end menu -->
    @yield('content')


    <div class="footer">
        <div class="container">
            <div class="col-md-6">
                <h3>MAP</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10532.577129483245!2d105.74980089189916!3d21.03955284175354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345492d40dbbc1%3A0x5b99183dc0929c0e!2zSOG7jWMgVmnhu4duIEvhu7kgVGh14bqtdCBRdcOibiBT4buxIC0gQ8ahIHPhu58gWHXDom4gUGjGsMahbmc!5e0!3m2!1sen!2sin!4v1509127598975" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-3">
                <h3>ĐỊA CHỈ LIÊN HỆ</h3>
                @foreach($lienhe as $item)
                    {!! $item['noidung'] !!}
                @endforeach
            </div>
            <div class="col-md-3">
                <h3>FACEBOOK</h3>
                @foreach($lienhe as $item)
                <div class="fb-page" data-href="{{ $item['face'] }}" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{ $item['face'] }}" class="fb-xfbml-parse-ignore"><a href="{{ $item['face'] }}">Facebook</a></blockquote></div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end class footer -->
    <div class="intro">
        <div class="container">
            <div class="col-md-12">
                <p style="text-align: center;">© Bản quyền thuộc về  - Thiết kế nội thất karaoke | thiết kế bởi <a href="">--Jupiter</a></p>
            </div>
        </div>
    </div>

</body>
</html>