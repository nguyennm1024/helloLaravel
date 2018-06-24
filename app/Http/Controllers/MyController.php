<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class MyController extends Controller
{
    public function XinChao() {
    	echo "Chao cac ban";
    } 

    public function KhoaHoc($name) {
    	echo "Khoa hoc: ",$name;
    	return redirect()->route('MyRoute');
    }

    public function GetUrl(Request $request) {
    	if($request->is('admin/*'))
    		return 'true';
    	else
    		return 'false';
    }

    public function postForm(Request $request) {
        echo "Ten ban la: ",$request->HoTen;
        echo "</br>",$request->has('HoTen');
    }

    public function setCookie() {
        $response = new Response();
        $response->withCookie('KhoaHoc','Laravel KhoaPham',1);
        return $response;
    }

    public function getCookie(Request $request) {
        return $request->cookie('KhoaHoc');
    }
    
    public function postFile(Request $request) {
        if($request->hasFile('myFile') && $request->file('myFile')->getClientOriginalExtension('myFile') == 'jpg') {
            $file = $request->file('myFile');
            $file->move('image',$file->getClientOriginalName('myFile'));
        }
        elseif ($request->file('myFile')->getClientOriginalExtension('myFile') =='png') {
            echo "Original Extension is png";
        }
        else {
            echo "Chua co file";
        }
    }

    public function getJson() {
        $array = ['2'=>'b'];
        return response()->json($array);
    }

    public function myView() {
        return view('view.KhoaPham');
    }

    public function Time($time) {
        return view('myView',['time'=>$time]);
    }

    public function blade($str) {
        $khoahoc = '';
        if($str == 'laravel') {
            return view('pages.laravel',['khoahoc'=>$khoahoc]);
        }
        elseif ($str == 'php') {
            return view('pages.php',['khoahoc'=>$khoahoc]);
        }
    }
}