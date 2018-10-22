<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    public function __construct() {
		$this->middleware('auth');
	}
	public function show() {
		echo "<hr/>";

		if(!Auth::check()) {
			return redirect()->back();
		}
		$user = Auth::user();
		dump($user);

		echo "<hr/>";
		
		if(view()->exists('Backend.index')) {
			$data = ['title'=>'Admin Panel'];
			
			return view('Backend.index',$data);
		}
	}
	
}
