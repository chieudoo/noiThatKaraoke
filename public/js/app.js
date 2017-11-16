$(document).ready(function() {
	const url="http://noithatkaraoke.dev/";
	$('.login button[type="submit"]').click(function(e){
		e.preventDefault();
		var email=$('.login input[type="text"]').val();
		var pass=$('.login input[type="password"]').val();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.post("dang-nhap",{e:email,p:pass},function(result){
			if(result == 0){
				$('.login h4').slideDown().css('color','#00ff21').html('login Success');
				$('.kengang').addClass('dira');
				setTimeout(function(){
					window.location.href=url+"quan-tri";
				},3000);
				
			}else{
				$('.login h4').slideDown().css('color','red').html('login error');
			}
			setTimeout(function(){
				$('.login h4').slideUp()
			},1500);
		});

	});
});