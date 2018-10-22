<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class PageController extends Controller
{
    //
	
	public function show ($alias) {
		
		if(!$alias) {
			abort(404);
		}
		
		
		if(view()->exists('Frontend.page')) {
			
			$page = Page::where('alias','=', strip_tags($alias))->first();//strip_tags удаляет HTML and PHP теги
			
			$data = [
				'title'=>$page->name,
				'page'=>$page
			];
			
			return view('Frontend.page', $data);
		}
		
	}
}

