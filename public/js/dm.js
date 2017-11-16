$(document).ready(function() {
	const url = "http://noithatkaraoke.dev/";

	$("a.fancybox").fancybox();

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});


	function capnhat(url1,data,url2){
		$.post(url1,data,function(result){
			setTimeout(function(){
				$('.success').slideDown();
				$('.kengang').addClass('dira');
			},500);

			setTimeout(function(){
				window.location.href= url + url2;
			},1000);
		});
	};

	function ajax(url1,data,url2,mota){
		$.ajax({
			url: url1,
			type: 'POST',
			processData:false,
			contentType:false,
			data: data,
			success:function(result){
				if(result == 0){
					setTimeout(function(){
						$('.success').html('<i class="fa fa-check" style="color: green;font-size: 20px"> Success</i>').slideDown();
						$('.kengang').addClass('dira');
					},500);

					setTimeout(function(){
						window.location.href= url + url2;
					},1000);
				}else{
					setTimeout(function(){
						$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px">' + mota + '</i>').slideDown();
					},500);
				}
			}
		});
	}



	$('.edit,.add,.change').click(function(){
		var data = $(this).data();
		var n = $('.form-group:eq(0) input[type="text"]');
		var t = $('.modal-title');

		var path = window.location.pathname;

		if(path == "/win-danh-muc"){
			if(data.click == "edit"){
				n.val(data.name);
				t.html("Sửa Danh Mục");
				$('button[type="submit"].sub_edit').show();
				$('button[type="submit"].sub_add').hide();

				$('.sub_edit').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var parent = $('.form-group:eq(1) select').val();
					var status = $('.form-group:eq(2) input[type="radio"]:checked').val();
					capnhat("win-danh-muc/"+data.id,{name:name,parent:parent,status:status},"win-danh-muc");
					

				});
				


			}else if(data.click == "add"){
				n.val("");
				t.html("Thêm Danh Mục");
				$('button[type="submit"].sub_edit').hide();
				$('button[type="submit"].sub_add').show();


				$('.sub_add').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var parent = $('.form-group:eq(1) select').val();
					var status = $('.form-group:eq(2) input[type="radio"]:checked').val();
					capnhat("win-danh-muc",{name:name,parent:parent,status:status},"win-danh-muc");

				});
				
			}
		} 
		/*end if win-danh-muc*/

		else if( path == "/win-cong-trinh"){
			if(data.click == "edit"){
				n.val(data.name);
				t.html("Sửa Công Trình");

				$('.form-group:eq(1) textarea[name="text"]').val(data.mota);
				$('.form-group:eq(0) input[type="hidden"]').val(data.user);
				CKEDITOR.instances['noidung'].setData(data.noidung);
				$('.form-group:eq(3) input[type="text"]').val("https://www.youtube.com/watch?v="+data.link);

				$('button[type="submit"].sub_edit').show();
				$('button[type="submit"].sub_add').hide();

				$('.sub_edit').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var mota = $('.form-group:eq(1) textarea[name="text"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var user =$('.form-group:eq(0) input[type="hidden"]').val();


					var l = $('.form-group:eq(3) input[type="text"]').val();
					var x 	= "https://www.youtube.com/watch?v=";

					var status = $('.form-group:eq(4) input[type="radio"]:checked').val();
					var link = l.slice(x.length, l.length);

					capnhat("win-cong-trinh/"+data.id,{name:name,mota:mota,status:status,noidung:noidung,link:link,user:user},"win-cong-trinh");
					

				});
				


			}else if(data.click == "add"){
				n.val("");
				t.html("Thêm Công Trình");

				$('.form-group:eq(1) textarea[name="text"]').val("");
				CKEDITOR.instances['noidung'].setData("");
				$('.form-group:eq(3) input[type="text"]').val("");

				$('button[type="submit"].sub_edit').hide();
				$('button[type="submit"].sub_add').show();


				$('.sub_add').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var mota = $('.form-group:eq(1) textarea[name="text"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var l = $('.form-group:eq(3) input[type="text"]').val();
					var x 	= "https://www.youtube.com/watch?v=";
					var status = $('.form-group:eq(4) input[type="radio"]:checked').val();
					var link = l.slice(x.length, l.length);

					capnhat("win-cong-trinh",{name:name,mota:mota,status:status,noidung:noidung,link:link},"win-cong-trinh");

				});
				
			}

		}
		/*end if win-cong-trinh*/
		else if(path == "/win-tu-van"){


			if(data.click == "edit"){

				t.html("Sửa Tư Vấn");
				$('button[type="submit"].sub_edit').show();
				$('button[type="submit"].sub_add').hide();

				$('.form-group:eq(1) input[type="text"]').val(data.name);
				$('.form-group:eq(1) input[type="hidden"]').val(data.user);
				$('.form-group:eq(4) input[type="hidden"]').val(data.img);
				$('.form-group:eq(2) textarea[name="mota"]').val(data.mota);
				CKEDITOR.instances['noidung'].setData(data.noidung);

				$('.sub_edit').click(function(e){
					e.preventDefault();

					var cat     = $('.form-group:eq(0) select').val();
					var name    = $('.form-group:eq(1) input[type="text"]').val();
					var user    = $('.form-group:eq(1) input[type="hidden"]').val();
					var mota    = $('.form-group:eq(2) textarea[name="mota"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var img     = $('.form-group:eq(4) input[type="file"]')[0].files[0];
					var aht     = $('.form-group:eq(4) input[type="hidden"]').val();
					var status  = $('.form-group:eq(5) input[type="radio"]:checked').val();
					
					var formdata = new FormData();
					formdata.append('file',img);
					formdata.append('anhht',aht);
					formdata.append('user',user);
					formdata.append('name',name);
					formdata.append('cat',cat);
					formdata.append('mota',mota);
					formdata.append('noidung',noidung);
					formdata.append('status',status);


					if(cat && name && mota && noidung && status ){
						

						
						ajax('win-tu-van/'+data.id,formdata,'win-tu-van','Vui long nhap mot anh hop le');


					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Not Empty</i>').slideDown();
						},500);
					}
					

				});
				


			}else if(data.click == "add"){
				t.html("Thêm Tư Vấn");
				$('button[type="submit"].sub_edit').hide();
				$('button[type="submit"].sub_add').show();


				$('.sub_add').click(function(e){
					e.preventDefault();
					
					var cat     = $('.form-group:eq(0) select').val();
					var name    = $('.form-group:eq(1) input[type="text"]').val();
					var mota    = $('.form-group:eq(2) textarea[name="mota"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var img     = $('.form-group:eq(4) input[type="file"]')[0].files[0];
					var status  = $('.form-group:eq(5) input[type="radio"]:checked').val();

					var formdata = new FormData();
					formdata.append('file',img);
					formdata.append('name',name);
					formdata.append('cat',cat);
					formdata.append('mota',mota);
					formdata.append('noidung',noidung);
					formdata.append('status',status);
					

					
					if(cat && name && mota && noidung && status && img){

						ajax('win-tu-van',formdata,'win-tu-van','Vui long nhap mot anh hop le');


					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Not Empty</i>').slideDown();
						},500);
					}
					
					
					

				});
				
			}
		}
		/*end if win-tu-van*/
		else if(path == "/win-san-pham"){
			if(data.click == "add"){
				t.html("Thêm Sản Phẩm");
				$('button[type="submit"].sub_edit').hide();
				$('button[type="submit"].sub_add').show();

				$('.sub_add').click(function(e){
					e.preventDefault();

					var cat     = $('.form-group:eq(0) select').val();
					var name    = $('.form-group:eq(1) input[type="text"]').val();
					var mota    = $('.form-group:eq(2) textarea[name="mota"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var img     = $('.form-group:eq(4) input[type="file"]')[0].files[0];
					var status  = $('.form-group:eq(5) input[type="radio"]:checked').val();

					var formdata = new FormData();
					formdata.append('img',img);
					formdata.append('name',name);
					formdata.append('cat',cat);
					formdata.append('mota',mota);
					formdata.append('noidung',noidung);
					formdata.append('status',status);


					if(name && mota && noidung && img){
						ajax('win-san-pham',formdata,'win-san-pham','Vui long nhap dung anh');
					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Cac truong khong duoc de trong</i>').slideDown();
						},500);
					}
					
					

				});
				
			}else if(data.click == "edit"){
				t.html("Sửa Sản Phẩm");
				$('button[type="submit"].sub_edit').show();
				$('button[type="submit"].sub_add').hide();

					
					$('.form-group:eq(1) input[type="text"]').val(data.name);
					$('.form-group:eq(2) textarea[name="mota"]').val(data.name);
					CKEDITOR.instances['noidung'].setData(data.noidung);
					$('.form-group:eq(4) input[type="hidden"]').val(data.img);

				$('.sub_edit').click(function(e){
					e.preventDefault();

					var cat     = $('.form-group:eq(0) select').val();
					var name    = $('.form-group:eq(1) input[type="text"]').val();
					var mota    = $('.form-group:eq(2) textarea[name="mota"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var img     = $('.form-group:eq(4) input[type="file"]')[0].files[0];
					var anhcu   = $('.form-group:eq(4) input[type="hidden"]').val();
					var status  = $('.form-group:eq(5) input[type="radio"]:checked').val();


					var formdata = new FormData();
					formdata.append('img',img);
					formdata.append('name',name);
					formdata.append('cat',cat);
					formdata.append('mota',mota);
					formdata.append('noidung',noidung);
					formdata.append('status',status);
					formdata.append('anhcu',anhcu);


					if(name && mota && noidung){
						ajax('win-san-pham/'+data.id,formdata,'win-san-pham','Vui long nhap dung anh');
					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Cac truong khong duoc de trong</i>').slideDown();
						},500);
					}

				});
			}
		}
		/*end if win-san-pham*/
		else if(path == "/win-gioi-thieu"){
			if(data.click == "edit"){
				t.html("Sửa Giới Thiệu");

				$('.form-group:eq(0) input[type="text"]').val('https://www.youtube.com/watch?v='+data.link);
				CKEDITOR.instances['noidung'].setData(data.noidung);

				$('.sub_edit').click(function(e){
					e.preventDefault();

					var l = $('.form-group:eq(0) input[type="text"]').val();
					var ls ="https://www.youtube.com/watch?v=";

					var link = l.slice(ls.length, l.length);

					var noidung = CKEDITOR.instances['noidung'].getData();
					if(link && noidung){
						capnhat("win-gioi-thieu/"+data.id,{link:link,noidung:noidung},"win-gioi-thieu");
					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Cac truong khong duoc de trong</i>').slideDown();
						},500);
					}
					
				});

				

			}
		} 
		/*end if win-gioi-thieu*/
		else if(path == "/win-slide"){
			if(data.click == "add"){
				t.html("Thêm Slide");
				$('button[type="submit"].sub_edit').hide();
				$('button[type="submit"].sub_add').show();



				$('.sub_add').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var img = $('.form-group:eq(2) input[type="file"]')[0].files[0];
					var status = $('.form-group:eq(3) input[type="radio"]:checked').val();

					var formdata = new FormData();
					formdata.append('name',name);
					formdata.append('noidung',noidung);
					formdata.append('img',img);
					formdata.append('status',status);


					if(img){
						ajax("win-slide",formdata,"win-slide","Vui long nhap dung mot anh");
					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Ảnh không được để trống</i>').slideDown();
						},500);
					}
					
				});
			}
			else if(data.click == "edit"){
				t.html("Sửa Slide");
				$('button[type="submit"].sub_edit').show();
				$('button[type="submit"].sub_add').hide();

				$('.form-group:eq(0) input[type="text"]').val(data.name);
				CKEDITOR.instances['noidung'].setData(data.noidung);
				$('.form-group:eq(2) input[type="hidden"]').val(data.img);

				$('.sub_edit').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var noidung = CKEDITOR.instances['noidung'].getData();
					var img = $('.form-group:eq(2) input[type="file"]')[0].files[0];
					var acu = $('.form-group:eq(2) input[type="hidden"]').val();
					var status = $('.form-group:eq(3) input[type="radio"]:checked').val();

					var formdata = new FormData();
					formdata.append('name',name);
					formdata.append('noidung',noidung);
					formdata.append('img',img);
					formdata.append('acu',acu);
					formdata.append('status',status);

					ajax("win-slide/"+data.id,formdata,"win-slide","Vui long nhap dung mot anh");
				});
			}
		}
		/*end if win-slide*/
		else if(path == "/win-user"){
			console.log(data);
			if(data.click == "add"){
				t.html("Thêm quản trị viên");
				$('button[type="submit"].sub_edit').hide();
				$('button[type="submit"].sub_add').show();

				$('.modal-body form:eq(0)').show();
				$('.modal-body form:eq(1)').hide();

				$('.form-group:eq(0) input[type="text"]').val("");
				$('.form-group:eq(1) input[type="email"]').val("");
				$('.form-group:eq(2) input[type="password"]').val("");

				$('.sub_add').click(function(e){
					e.preventDefault();

					var name = $('.form-group:eq(0) input[type="text"]').val();
					var email = $('.form-group:eq(1) input[type="email"]').val();
					var pass = $('.form-group:eq(2) input[type="password"]').val();

					var formdata = new FormData();
					formdata.append('name',name);
					formdata.append('email',email);
					formdata.append('pass',pass);

					if(name && email && pass){
						if(pass.length < 8){
							setTimeout(function(){
								$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Password required min 8 character</i>').slideDown();
							},500);
						}else{
							ajax("win-user",formdata,"win-user","Vui lòng nhập email hợp lệ");
						}
						
					}else{
						setTimeout(function(){
							$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Fill all field</i>').slideDown();
						},500);
					}
				});
			}
			else if(data.click=="edit"){
				t.html("Sửa quản trị viên");
				$('button[type="submit"].sub_edit').show();
				$('button[type="submit"].sub_add').hide();

				$('.modal-body form:eq(0)').show();
				$('.modal-body form:eq(1)').hide();

				$('.form-group:eq(0) input[type="text"]').val(data.name);
				$('.form-group:eq(1) input[type="email"]').val(data.email);

				
			}

		}
		/*end if win-user*/
		else if(path == "/win-lien-he"){
			t.html("Sửa thông tin liên hệ");

			CKEDITOR.instances['noidung'].setData(data.noidung);
			$('.form-group:eq(2) input[type="text"]').val(data.face);
			$('.form-group:eq(1) input[type="hidden"]').val(data.img);

			


			$('.sub_edit').click(function(e){
				e.preventDefault();
				var noidung = CKEDITOR.instances['noidung'].getData();
				var face = $('.form-group:eq(2) input[type="text"]').val();
				var logo = $('.form-group:eq(1) input[type="file"]')[0].files[0];
				var acu = $('.form-group:eq(1) input[type="hidden"]').val();

				var formdata = new FormData();
				formdata.append('noidung',noidung);
				formdata.append('face',face);
				formdata.append('img',logo);
				formdata.append('acu',acu);

				if(noidung && face){
					ajax("win-lien-he/"+data.id,formdata,"win-lien-he","Nhập đúng một ảnh hợp lệ");
				}else{
					setTimeout(function(){
						$('.success').html('<i class="fa fa-close" style="color: red;font-size: 20px"> Fill all field</i>').slideDown();
					},500);
				}

			});
			
			
		}

		/*end if win-lien-he*/
		else if(path == "/win-create-role"){
			$('.create').click(function(e){
				e.preventDefault();

					var them = $('.checkbox:eq(0) input[type="checkbox"]:checked').val();
					var sua = $('.checkbox:eq(1) input[type="checkbox"]:checked').val();
					var xoa = $('.checkbox:eq(2) input[type="checkbox"]:checked').val();


					if(them == null){
						them = 0;
					}
					if(sua == null){
						sua = 0;
					}
					if(xoa == null){
						xoa = 0;
					}

					var formdata = new FormData();
					formdata.append('them',them);
					formdata.append('sua',sua);
					formdata.append('xoa',xoa);

					$.ajax({
						url: 'win-role/'+data.id,
						type: 'POST',
						contentType:false,
						processData:false,
						data: formdata,
						success:function(result){
							if(result == 0){
								setTimeout(function(){
									$('.success').html('<i class="fa fa-check" style="color: green;font-size: 20px"> Success</i>').slideDown();
									$('.kengang').addClass('dira');
								},500);

								setTimeout(function(){
									window.location.href= url + url2;
								},1000);
							}
						}
					});
			});
		}
		// end if win-create-role
	});
	


});