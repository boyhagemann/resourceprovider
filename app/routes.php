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

Route::get('/news', function()
{
	return array(
		array(
			'id' => 1,
			'title' => 'Testtitel',
			'body' => 'Body',
		)
	);
});

Route::options('/news', function()
{
	return array(
        'contract' => '12345newscreate',
        'collection' => true,
	);
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

Route::get('/contracts/news', function()
{
	return array(
		'title' => array(
			'contract' => 'string',
			'required' => true,
		),
		'news' => array(
			'contract' => '12345newscreate',
            'collection' => true,
			'required' => true,
		),
	);
});

Route::options('/news/create', function()
{
	return array(
		'title' => array(
			'contract' => 'string',
			'required' => true,
		),
		'body' => array(
			'contract' => 'text',
			'required' => true,
		),
	);
});

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