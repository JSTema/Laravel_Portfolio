<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    public function show() {
		
		if(view()->exists('Backend.services')) {
			$services = Service::all();
			
			$data = [
				'title'=>'Сервисы',
				'services'=>$services
			];
				return view('Backend.services', $data);
		}
		
	}
}
