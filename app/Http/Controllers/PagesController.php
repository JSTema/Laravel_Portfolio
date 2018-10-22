<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class PagesController extends Controller
{
    //
	
	public function show () {
		
		if(view()->exists('Backend.pages')){
			
			$pages = Page::all();
			
			$data = [
				'title'=>'Страницы',
				'pages'=>$pages,
			];
			
			return view('Backend.pages',$data);
		}
		
	}
}
