<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['namespace'=>'dangnhap'],function(){
	Route::get('get-user',['uses'=>'loginController@getUser']);
	Route::get('dang-nhap',['as'=>'login','uses'=>'loginController@getLogin']);
	Route::get('dang-xuat',['as'=>'logout','uses'=>'loginController@getLogout']);
	Route::post('dang-nhap',['uses'=>'loginController@postLogin']);
});

Route::group(['namespace'=>'quantri','middleware'=>'veryfiAdmin'],function(){
	Route::get('quan-tri',['as'=>'index','uses'=>'homeController@index']);
	Route::group(['namespace'=>'danhmuc'],function(){
		Route::get('win-danh-muc',['as'=>'danhmuc','uses'=>'cateController@getCate']);
		Route::post('win-danh-muc',['uses'=>'cateController@postCate']);
		Route::post('win-danh-muc/{id}',['uses'=>'cateController@editCate'])->where(['id'=>'[0-9]+']);
		Route::get('delete-danh-muc/{id}',['uses'=>'cateController@deleteCate'])->where(['id'=>'[0-9]+']);
	});

	Route::group(['namespace'=>'congtrinh'],function(){
		Route::get('win-cong-trinh',['as'=>'congtrinh','uses'=>'congController@getCong']);
		Route::post('win-cong-trinh',['uses'=>'congController@postCong']);
		Route::post('win-cong-trinh/{id}',['uses'=>'congController@editCong'])->where(['id'=>'[0-9]+']);
		Route::get('delete-cong-trinh/{id}',['uses'=>'congController@deleteCong'])->where(['id'=>'[0-9]+']);
	});

	Route::group(['namespace'=>'tuvan'],function(){
		Route::get('win-tu-van',['as'=>'tuvan','uses'=>'tuController@getTu']);
		Route::post('win-tu-van',['uses'=>'tuController@postTu']);
		Route::post('win-tu-van/{id}',['uses'=>'tuController@editTu'])->where(['id'=>'[0-9]+']);
		Route::get('delete-tu-van/{id}',['uses'=>'tuController@deleteTu'])->where(['id'=>'[0-9]+']);
	});
	
	Route::group(['namespace'=>'sanpham'],function(){
		Route::get('win-san-pham',['as'=>'sanpham','uses'=>'SanController@getSan']);
		Route::post('win-san-pham',['uses'=>'SanController@postSan']);
		Route::post('win-san-pham/{id}',['uses'=>'SanController@editSan'])->where(['id'=>'[0-9]+']);
		Route::get('delete-san-pham/{id}',['uses'=>'SanController@deleteSan'])->where(['id'=>'[0-9]+']);
	});

	Route::group(['namespace'=>'gioithieu'],function(){
		Route::get('win-gioi-thieu',['as'=>'gioithieu','uses'=>'GTController@getGT']);
		Route::post('win-gioi-thieu/{id}',['uses'=>'GTController@postGT'])->where(['id'=>'[0-9]+']);
	});

	Route::group(['namespace'=>'slide'],function(){
		Route::get('win-slide',['as'=>'slide','uses'=>'SlideController@getSlide']);
		Route::post('win-slide',['uses'=>'SlideController@postSlide']);
		Route::post('win-slide/{id}',['uses'=>'SlideController@editSlide'])->where(['id'=>'[0-9]+']);
		Route::get('delete-slide/{id}',['uses'=>'SlideController@deleteSlide'])->where(['id'=>'[0-9]+']);
	});

	Route::group(['namespace'=>'user'],function(){
		Route::get('win-user',['as'=>'user','uses'=>'UserController@getUser']);
		Route::post('win-user',['uses'=>'UserController@postUser']);
		Route::get('win-edit-user/{id}',['uses'=>'editUserController@getEditUser'])->where(['id'=>'[0-9]+']);
		Route::post('win-edit-user/{id}',['uses'=>'editUserController@postEditUser'])->where(['id'=>'[0-9]+']);
		Route::get('delete-user/{id}',['uses'=>'UserController@deleteUser'])->where(['id'=>'[0-9]+']);
		
		
	});

	Route::group(['namespace'=>'lienhe'],function(){
		Route::get('win-lien-he',['as'=>'lienhe','uses'=>'lienheController@getLien']);
		Route::post('win-lien-he/{id}',['uses'=>'lienheController@postLien'])->where(['id'=>'[0-9]+']);
	});


	Route::group(['namespace'=>'role'],function(){
		Route::get('win-create-role',['as'=>'role','uses'=>'RoleController@getRole']);
		Route::post('win-create-role',['uses'=>'RoleController@postRole']);
		
		Route::get('win-add-role',['as'=>'add','uses'=>'addUserRoleController@addUserRole']);
		Route::post('win-add-role',['uses'=>'addUserRoleController@postAddUserRole']);

		
	});


});

/*end route quantri*/

Route::group(['namespace'=>'website'],function(){
	Route::get('/',['as'=>'index','uses'=>'homeController@index']);
	Route::get('tim-kiem/{key}',['uses'=>'homeController@timkiem']);
	Route::group(['namespace'=>'page'],function(){
		Route::get('page/{slug}',['as'=>'page','uses'=>'pageController@page']);
		Route::get('page/{id}/{slug}',['uses'=>'pageController@pageCon'])->where(['id'=>'[0-9]+']);
		Route::get('chi-tiet-cong-trinh/{slug}/{id}',['uses'=>'pageController@pageChitietCongtrinh'])->where(['id'=>'[0-9]+']);
		Route::get('tu-van-chi-tiet/{slug}/{id}',['uses'=>'pageController@pageChitietTuvan'])->where(['id'=>'[0-9]+']);
		Route::get('chi-tiet-san-pham/{slug}/{id}',['uses'=>'pageController@pageChitietSP'])->where(['id'=>'[0-9]+']);
	});
});