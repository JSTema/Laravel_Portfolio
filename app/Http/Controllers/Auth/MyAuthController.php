<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class MyAuthController extends Controller
{

//    public function showLogin () {
//		if(view()->exists('auth.login')){
//			return view('auth.login');
//		}
//		abort(401);
//		
//	}
//	
//	public function authenticate (Request $request) {
//		
//		$array = $request->all();
//		
//		$remember = $request->has('remember');
//		
//		if(Auth::attempt([
//			'login'=>$array['login'],
//			'password'=>$array['password']
//		], $remember)) {
//			return redirect()->intended('/admin');
//		}
//		
//		return redirect()
//				->back()
//				->withInput($request->only('login','remember'))
//				->withErrors([
//					'login'=>'Данные аутентификации не верны',
//				]);
//		
//		
//		
//		
//	}
}
