<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use \Validator;
use Session;

use DB;
use App\Mail\MailClass;

class IndexController extends Controller
{
    //
	
	public function show (Request $request) {
		//		Работа с ФОРМОЙ
		if($request->isMethod('post')){
			
			$rules = [
				'name'=>'required|max:11',
				'email'=>'required|email|max:30',
				'text'=>'required|max:255'
				
			];
			
			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению !',
				'email'=>'Поле :attribute должно соответствовать email адрессу !',
				'max'=>'Поле :attribute содержит боллее :max символов!',
			];
			
			$res = $this->validate($request, $rules, $messages);
//			dump($res);
			$data = $request->all();
//			dump($data);
		
//	Отправляем email пользователю
			
			$name = $data['name'];
			$email = $data['email'];
			$text = $data['text'];
			
			$res = Mail::to('jsdvtema@ukr.net')->send(new MailClass($name,$email,$text));
			
			if($res){
				return redirect()->route('home')->with('status', 'Сообщение отправленно !');
			}
		
		}
//		Конец работы с формой
		
		$pages = Page::all();
		$peoples = People::all();
		$services = Service::where('id','<',20)->get();
		
		$portfolios = Portfolio::get(array('name','filter','images'));
		//в переменной $tags хранится наши фильтры для раздела Portfolio
		$tags = DB::table('portfolios')->distinct()->pluck('filter');
		$clients = DB::table('clients')->select('name','icon')->get();
		
		
//		$images = DB::table('portfolios')->select('images')->get();
//		dump($images);
	
		$menu = array();
		
		foreach ($pages as $page) {
			$item = array('title'=>$page->name, 'alias'=>$page->alias);
			array_push($menu,$item);
		}
		
		$item = array('title'=>'Services','alias'=>'service');
		array_push($menu,$item);
		
		$item = array('title'=>'Portfolio','alias'=>'Portfolio');
		array_push($menu,$item);
		
		$item = array('title'=>'Client','alias'=>'clients');
		array_push($menu,$item);
		
		$item = array('title'=>'Team','alias'=>'team');
		array_push($menu,$item);
		
		$item = array('title'=>'Contact','alias'=>'contact');
		array_push($menu,$item);
		
		
		
		
	
		
		return view('Frontend.index',[
			'menu'=>$menu,
			'pages'=>$pages,
			'services'=>$services,
			'portfolio'=>$portfolios,
			'peoples'=>$peoples,
			'tags'=>$tags,
			'clients'=>$clients
		]);
		
	}
	
//		return redirect()->route('home');

	
//	public function store (Request $request) {
//
//
//	
//}
//		

	
	
}	

