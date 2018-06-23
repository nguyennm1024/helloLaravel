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

Route::get('/', function () {
    return view('welcome');
});

Route::get('KhoaHoc', function() {
	return "Xin chao cac ban";
});

Route::get('ManhNguyen/Laravel', function() {
	echo "<h1>Ket noi van vat<h1>";
});

Route::get('ManhNguyen/{name}', function($name) {
	echo "Chao dai ca ", $name;
});

Route::get('Laravel/{ngay}', function($ngay) {
	echo "Ngay hom nay la ", $ngay;
})->where(['ngay'=>'[a-zA-Z ]+']);

//Dinh danh cho Routes

Route::get('Route1',['as' => 'MyRoute', function() {
	echo "Xin chao cac ban";
}]);

Route::get('GoiTen', function() {
	return redirect()->route('MyRoute2');
});

Route::get('DoiTen', function() {
	return "Da Doi Ten";
})->name('MyRoute2');

Route::group(['prefix' => 'MyGroup'], function(){
	Route::get('User1', function(){
		echo "This is User 1";
	});
	Route::get('User2', function() {
		echo "This is User 2";
	});
});

//Bai goi controller
Route::get('GoiController','MyController@XinChao');

Route::get('ThamSo/{ten}','MyController@KhoaHoc');

Route::get('MyRequest','MyController@GetUrl');

//Gui nhann du lieu voi request
Route::get('getForm',function() {
	return view('postForm');
});

Route::post('postForm',['as'=>'postForm','uses'=>'MyController@postForm']);

//Cookie
Route::get('setCookie','MyController@setCookie');

Route::get('getCookie','MyController@getCookie');

//uploadFile
Route::get('uploadFile', function() {
	return view('postFile');
});

Route::post('postFile',['as'=>'postFile','uses'=>'MyController@postFile']);

Route::get('getJson','MyController@getJson');

Route::get('myView','MyController@myView');

Route::get('Time/{t}','MyController@Time');

View::share('KhoaHoc','Laravel');

//Blade tempplate
Route::get('blade',function() {
	return view('pages.laravel');
});

Route::get('php',function(){
	return view('pages.php');
});

Route::get('BladeTemplate/{str}','MyController@blade');
