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

//Database
Route::get('database',function() {
	// Schema::create('loaisanpham',function($table){
	// 	$table->increments('id');
	// 	$table->string('ten',200);
	// });
	Schema::create('theloai',function($table){
		$table->increments('id');
		$table->string('ten',200)->nullable();
		$table->string('nsx')->default('Nha san xuat');
	});
	echo "Da thuc hien lenh tao bang";
});

Route::get('lienketbang',function(){
	Schema::create('sanpham',function($table){
		$table->increments('id');
		$table->string('ten');
		$table->float('gia');
		$table->integer('soluong')->default(0);
		$table->integer('id_loaisanpham')->unsigned();
		$table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');
	});
	echo "Da tao bang san pham";
});

Route::get('suabang',function(){
	Schema::table('theloai',function($table){
		$table->dropColumn('nsx');
	});
	echo "Da xoa cot";
});

Route::get('themcot',function(){
	Schema::table('theloai',function($table){
		$table->string('email');
	});
	echo "Da them cot email";
});

Route::get('doiten',function(){
	Schema::rename('theloai','nguoidung');
	echo "Da doi ten bang";
});

Route::get('xoabang',function(){
	Schema::drop('nguoidung');
	echo "Da xoa bang nguoi dung";
});
//Query Builder
Route::get('qb/get',function(){
	$data = DB::table('users')->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value){
			echo $key,":",$value,"<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/where',function(){
	$data = DB::table('users')->where('id','=',5)->get();
	foreach($data as $row)
	{
		foreach($row as $key=>$value){
			echo $key,":",$value,"<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/select',function(){
	$data = DB::table('users')->select(['id','name','email'])->where('id',5)->get();

	foreach($data as $row)
	{
		foreach($row as $key=>$value){
			echo $key,":",$value,"<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/orderby',function(){
	$data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->orderBy('id','desc')->skip(1)->take(2)->get();
	var_dump($data);
	echo $data->count();
	// foreach($data as $row)
	// {
	// 	foreach($row as $key=>$value){
	// 		echo $key,":",$value,"<br>";
	// 	}
	// 	echo "<hr>";
	// }
});

Route::get('model/save',function(){
	$user = new App\User();
	$user->name = "Mai";
	$user->email = "Mai@email.com";
	$user->password = "matkhau";
	$user->save();
	echo "Da save";
});

Route::get('model/sanpham/save/{ten}',function($ten){
	$sanpham = new App\SanPham();
	$sanpham->ten = $ten;
	$sanpham->soluong = 100;
	$sanpham->save();
	echo "Saved";
});

Route::get('model/sanpham/all',function(){
	$sanpham = App\SanPham::all()->toArray();
	var_dump($sanpham);
});

Route::get('model/sanpham/ten',function(){
	$sanpham = App\SanPham::where('ten','PC')->get()->toArray();
	var_dump($sanpham);
	echo $sanpham[0]['ten'];
});

Route::get('model/sanpham/delete',function(){
	$sanpham = App\SanPham::destroy(3);
	echo "deleted";
});

Route::get('taocot',function(){
	Schema::table('sanpham',function($table){
		$table->integer('id_loaisanpham')->unsigned();
	});
});

Route::get('lienket',function(){
	$data = App\SanPham::find(4)->loaisanpham->toArray();
	var_dump($data);
});

Route::get('lienketloaisanpham',function(){
	$data = App\LoaiSanPham::find(2)->sanpham->toJson();
	var_dump($data);
});

Route::get('diem',function(){
	echo "Ban da co diem";
})->middleware('MyMiddle')->name('diem');

Route::get('loi',function(){
	echo "Ban chua co diem";
})->name('loi');

Route::get('nhapdiem',function(){
	return view('nhapdiem');
})->name('nhapdiem');

Route::get('dangnhap',function(){
	return view('dangnhap');
});

Route::get('thu',function(){
	return view('thanhcong');
});

Route::post('login','AuthController@login')->name('login');

Route::get('logout','AuthController@logout');