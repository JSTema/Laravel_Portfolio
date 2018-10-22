<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use \Validator;

class PagesEditController extends Controller
{ 
    //
	public function show (Page $page, Request $request) {
//	   	в метод	show($id)
//		$page = Page::find($id);
//		dd($page);
		
		
		//		DELETE or DESTROY
		
		if($request->isMethod('DELETE')) {
			$page->delete();
			return redirect('admin')->with('status','Страница Удалена !');
		}
		
		
		
		
//		POST
		if($request->isMethod('POST')) {
			
		$input = $request->except('_token');
	
			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению !',
				'unique'=>'Поле :attribute должно быть уникальным для  :pages !',
				'max'=>'Поле :attribute содержит боллее :max символов!',
			];
			
		$validator = Validator::make($input,[
			'name'=>'required|string|max:50',
			'alias'=>'required|string|unique:pages,alias,'.$input['id'],
			'text'=>'required|string'
		],$messages);
			
			if($validator->fails()) {
				return redirect()
					->route('pagesEdit',['page'=>$input['id']])
					->withErrors($validator);
			}
			
			if($request->hasFile('images')) {
				$file = $request->file('images');
				$file->move(public_path().'/assets/img/',$file->getClientOriginalName());
				$input['images'] = $file->getClientOriginalName();
			}
			else{
				$input['images'] = $input['old_images'];
			}
			
			unset($input['old_images']);
			
			$page->fill($input);
			
			if($page->update()) {
				return redirect('admin')->with('status','Страница обновленна !');				
			}
			
			
		}
		
//		GET
		$old = $page->toArray();
		
		if(view()->exists('Backend.pages_edit')) {
			
			
			$data  = [
				'title'=>'Редактирование Страницы - '.$old['name'],
				'data'=>$old
			];
			
			return view('Backend.pages_edit', $data);
			
		}
		

	}
	
	
	
}
