<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
}