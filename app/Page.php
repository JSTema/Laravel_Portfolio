<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
	protected $table = 'pages';
	
	protected $fillable =['name','alias','text','images'];
	
	protected $casts = [
//		'text'=>'array',
		//'text'=>'string' //поле text будет иметь тип данных string
	];
}
