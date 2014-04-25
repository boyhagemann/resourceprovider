<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('news', 'NewsController');

Route::options('/news', function()
{
	return array(
        'contract' => '12345newscreate',
        'collection' => true,
	);
});

Route::post('/views/form', function() {

	// Build a form based on the input params

	return View::make('form', Input::all());
});

Route::post('/views/{view}', function($view)
{
	try {
		return View::make($view, Input::all())->render();
	}
	catch(Exception $e) {
		return json_encode(array('message' => $e->getMessage(), 'vars' => Input::all()));
	}
});

Route::get('/contracts/news', 'NewsController@indexContract');
Route::options('/news/create', 'NewsController@createContract');




Route::get('/contracts/layout', function()
{
	return array(
		'title' => array(
			'contract' => 'string',
			'required' => true,
		),
		'content' => array(
			'contract' => 'text',
			'required' => true,
		),
		'sidebar' => array(
			'contract' => 'text',
			'required' => true,
		),
	);
});

Route::get('/contracts/form', function()
{
	return array(
		'target' => array(
			'contract' => 'string',
			'help' => 'This is the data source where the collected form input is send to',
			'required' => true,
		),
		'title' => array(
			'contract' => 'string',
			'help' => 'The title above the form',
			'required' => true,
		),
	);
});


