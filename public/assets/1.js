$(document).ready(function() {
	$('.bot_menu ul.nav.navbar-nav.navbar-left li').hover(function(){
		$(this).find('ul').slideDown();
	},function(){
		$(this).find('ul').fadeOut(100);
	});
	var body_width = $('body').width();
	if(body_width < 768){
		$('.bot_menu ul.nav.navbar-nav.navbar-left li').find('ul').addClass('m_mobile');
	}else{
		$('.bot_menu ul.nav.navbar-nav.navbar-left li ul.m_mobile').removeClass();
	}
	$(window).resize(function(event) {
		var body = $('body').width();
		if(body < 768){
			$('.bot_menu ul.nav.navbar-nav.navbar-left li').find('ul').addClass('m_mobile');
		}else{
			$('.bot_menu ul.nav.navbar-nav.navbar-left li ul.m_mobile').removeClass();
		}
	});

	$(window).scroll(function(){
		var body = $('body,html').scrollTop();
		var vt_menu = $('.menu .bot_menu').offset().top;
		if(body >= 79){
			$('.menu .bot_menu').addClass('fix_top');
		}else{		
			$('.menu .bot_menu').removeClass('fix_top');
		}
	});

	$('.building .item .nd_item').hover(function(){
		$(this).addClass('nd_dilen');
	},function(){
		$(this).removeClass('nd_dilen');
	});

	$('.page .item .nd_item').hover(function(){
		$(this).addClass('nd_dilen');
	},function(){
		$(this).removeClass('nd_dilen');
	});

	$('.support .i_sup').hover(function(){
		$(this).find('div.nd_i_sup').addClass('i_hienra');
	},function(){
		$(this).find('div.nd_i_sup').removeClass('i_hienra').addClass('i_bienmat').one('webkitAnimationEnd', function() {
			$(this).removeClass('i_bienmat');
		});
	});

	$('.page .i_sup').hover(function(){
		$(this).find('div.nd_i_sup').addClass('i_hienra');
	},function(){
		$(this).find('div.nd_i_sup').removeClass('i_hienra').addClass('i_bienmat').one('webkitAnimationEnd', function() {
			$(this).removeClass('i_bienmat');
		});
	});

	$('.menu .top_menu form.navbar-form input[type="text"]').keyup(function(){
		var keyword = $(this).val();

		if(keyword){
			$.ajax({
				url: 'tim-kiem/'+keyword,
				type: 'GET',
				data: keyword,
				success:function(result){
					$('.hien_denghi').slideDown().find('ul').html(result);
				}
			});
		}else{
			$('.hien_denghi').slideUp();
		}
		
		
	});

	$('.sanpham .item').hover(function(){
		$(this).find('h5').fadeIn();
	},function(){
		$(this).find('h5').fadeOut();
	});




});