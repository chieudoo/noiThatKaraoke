<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('assets/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="kengang"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-push-4">
					<div class="login">
						<h4></h4>
						<form action="" method="POST" role="form">
						
							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						
							
						
							<button type="submit" class="btn btn-primary">LOGIN</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<style type="text/css">
	html,body{
		width: 100%;height: 100%;
		background: #75c35d;
	}
	.kengang{
		width: 100%;
		height: 5px;
		background: blue;
		opacity: 0;
	}
	.kengang.dira{
		animation:dira 1.5s forwards;
		animation-delay: 1.5s;
	}
	@keyframes dira{
		0%{
			opacity: 0;
			transform: translateX(-1400px);
		}
		100%{
			opacity: 1;
			transform: translateX(0);
		}
	}
	.login{
		width: 100%;
		padding:50px 25px;
		background: #fff;box-shadow: 0px 0px 5px 0px #3c3636d9;
		margin-top: 100px;position: relative;
	}
	.login h4{
		text-align: center;
    	margin: 0px auto 20px;
    	display: none;
    	color: #00ff21;
    	text-transform: uppercase;
	}
</style>
</html>