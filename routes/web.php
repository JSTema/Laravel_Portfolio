<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/

// Route::get('/', function()
// {
// 	$manager->make('../public/assets/img/ipad_web_app_1.jpg')
//             ->resize(100, 100)
//             ->save('../public/assets/imagic/ipad_web_app_recize.jpg');

// });

Route::group([],function () {
	
	Route::match(['get','post'], '/' , ['uses'=>'IndexController@show','as'=>'home']);
	Route::get('/page/{alias}',['uses'=>'PageController@show','as'=>'page']);

    Route::auth();
}); 


//Admin
Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {
	Route::get('/',['uses'=>'Admin\AdminController@show'])->name('admin');
	//get our admin page
//	Route::get('/',function () {

//		if(view()->exists('Backend.index')) {
//			$data = ['title'=>'Admin Panel'];
//			
//			return view('Backend.index',$data);
//		}
		
//	});
	//admin/pages
	Route::group(['prefix'=>'pages'], function () {
		//admin/pages
		Route::get('/',['uses'=>'PagesController@show','as'=>'pages']);
		//admin/pages/ad
		Route::match(['get','post'], '/add', ['uses'=>'PagesAddController@show','as'=>'pagesAdd']);
		//admin/edit/2
		Route::match(['get','post', 'delete'], '/edit/{page}' , ['uses'=>'PagesEditController@show','as'=>'pagesEdit']);
		
		
	});
	
	//admin/services
	Route::group(['prefix'=>'services'], function () {
		//admin/services
		Route::get('/',['uses'=>'ServicesController@show','as'=>'service']);
		
		Route::match(['get','post'], '/add', ['uses'=>'ServiceAddController@show','as'=>'serviceAdd']);
		
		Route::match(['get','post', 'delete'], '/edit/{service}' , ['uses'=>'ServiceEditController@show','as'=>'serviceEdit']);
		
	});
	
	
	
	
});

