<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use \Validator;
use App\Page;


class PagesAddController extends Controller
{
	
	public function show (Request  $request) {
		//post запрос
		if($request->isMethod('POST')) {
			
		$input = $request->except('_token');
			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению !',
				'unique'=>'Поле :attribute должно быть уникальным для  :pages !',
				'max'=>'Поле :attribute содержит боллее :max символов!',
			];
			
		 $validator = Validator::make($request->except('_token'), [
            'name' => 'required|max:255',
            'alias' => 'required|unique:pages|max:255',
            'text' => 'required|max:255'
        ], $messages);
			
        if ($validator->fails()) {
            return redirect()
						->route('pagesAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
			//Загрузка файла 
			if($request->hasFile('images')) {
				$file = $request->file('images');
				$input['images'] = $file->getClientOriginalName();
				//Сохраняем изображение в дерективу проекта 
				$file->move(public_path().'/assets/img', $input['images']);
			}
			
			$page = new Page();
			//Заполнение данными из формы 
			$page->fill($input);
			
			if($page->save()) {
				
				return redirect('admin')->with('status','Страница добавленна !');
			}
				
            
     }
			
			
	
	
    //
		
		//get апрос
		if(view()->exists('Backend.pages_add')) {
			
			$data = [
				'title'=>'Новая страница',
			];
			return view('Backend.pages_add', $data);
		}
		
		abort(404);
	}
	
}
