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

// Route::get('/', function () {
//     return view('welcome');
// });



	
// without validation routes
// Route::get('/', function () {
//     return view('say');
// })->name('say');


// Route::group(['prefix' => 'myapp'], function(){

// 	Route::post('/hello', [
// 		'uses' => 'SayHelloController@postHello',
// 		'as' => 'helo'

// 	]);


// });



//using validation via middleware
Route::group(['middleware' => ['web']], function(){

	//before using controller functions
	// Route::get('/', function () {
 //    	return view('say');
	// })->name('say');


	Route::get('/', [
		
		'uses' => 'SayHelloController@getSay',
		'as' => 'say'
	]);


	Route::group(['prefix' => 'myapp'], function(){


		//before database insert and fetch
		// Route::post('/hello', [
		// 	'uses' => 'SayHelloController@postHello',
		// 	'as' => 'helo'
		// ]);

		//after database
		Route::post('/add_action', [
			'uses' => 'SayHelloController@postInsertAction',
			'as' => 'add_action'

		]);

		Route::get('/edit_actions', [
			'uses'=> 'SayHelloController@getEditAction',
			'as' => 'edit_actions'

		]);

		Route::post('/edit', [
			'uses'=> 'SayHelloController@editAction',
			'as' => 'edit'

		]);



		Route::get('/{action}/{message?}', [

			'uses' => 'SayHelloController@getHello',
			'as' => 'actions'
				
		]);

	});
});










Route::resource('products', 'ProductController');