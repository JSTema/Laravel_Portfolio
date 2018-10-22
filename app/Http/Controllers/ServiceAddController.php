<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use \Validator;
use App\Service;

class ServiceAddController extends Controller
{
   	public function show(Request $request) {		
//		POST
		
		if($request->isMethod('POST')) {
			
		$input = $request->except('_token');
			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению !',
				'max'=>'Поле :attribute содержит боллее :max символов!',
			];
			
		 $validator = Validator::make($request->except('_token'), [
            'name' => 'required|max:255',
            'text' => 'required'
        ], $messages);
			
        if ($validator->fails()) {
            return redirect()
						->route('serviceAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
			//Загрузка файла 
			if($request->hasFile('icon')) {
				$file = $request->file('icon');
				$input['icon'] = $file->getClientOriginalName();
				//Сохраняем изображение в дерективу проекта 
				$file->move(public_path().'/assets/img', $input['icon']);
			}
			
			$service = new Service();
			//Заполнение данными из формы 
			$service->fill($input);
			
			if($service->save()) {
				
				return redirect('admin')->with('status','Сервис добавлен !');
			}
				
            
     }
		//		DELETE
		
		
		
		//		GET
		if(view()->exists('Backend.services_add')) {
			$data = [
				'title'=>'Новый сервис',	
			];
			return view('Backend.services_add',$data);
		}
		
		
		
		

		
	}
}
