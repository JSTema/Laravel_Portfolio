<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use \Validator;

class ServiceEditController extends Controller
{
    public function show(Service $service, Request $request) {
		//		DELETE
		if($request->isMethod('DELETE')){
			$service->delete();
			return redirect('admin')->with('status','Сервис удален !');
		}
		
		
//		POST
		if($request->isMethod('POST')) {
			
		$input = $request->except('_token');
	
			$messages = [
				'required'=>'Поле :attribute обязательно к заполнению !',
				'max'=>'Поле :attribute содержит боллее :max символов!',
			];
			
		$validator = Validator::make($input,[
			'name'=>'required|string|max:50',
			'text'=>'required|string'
		],$messages);
			
			if($validator->fails()) {
				return redirect()
					->route('serviceEdit',['service'=>$input['id']])
					->withErrors($validator);
			}
			
			if($request->hasFile('icon')) {
				$file = $request->file('icon');
				$file->move(public_path().'/assets/img/',$file->getClientOriginalName());
				$input['icon'] = $file->getClientOriginalName();
			}
			else{
				$input['icon'] = $input['old_icon'];
			}
			
			unset($input['old_icon']);
			
			$service->fill($input);
			
			if($service->update()) {
				return redirect('admin')->with('status','Сервис  обновлен !');				
			}
			
			
		}
	
		
//		GET
		$old = $service->toArray();
		
		if(view()->exists('Backend.services_edit')) {
			
			$data = [
				'title'=>'Редактирование сервиса - '.$old['name'],
				'data'=>$old
			];
			return view('Backend.services_edit', $data);
		}
		
		
		
		
	}
}
