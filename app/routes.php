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

/**
 *
 * Resolve the view script with the input variables
 *
 */
Route::post('/views/{view}', function($view)
{
	try {
		return View::make($view, Input::all())->render();
	}
	catch(Exception $e) {
		return json_encode(array('message' => $e->getMessage(), 'vars' => Input::all()));
	}
});

/**
 *
 * Get the variables needed to resolve the view
 *
 */
Route::get('/views/layouts.default', function()
{
	return array(
		'fields' => array(
			'title' => array(
				'label' => 'Title',
				'help' => 'Give the page a title',
				'required' => true,
				'type' => 'string',
			),
			'content' => array(
				'label' => 'Content',
				'help' => 'Main content',
				'required' => true,
				'type' => 'templates',
			),
			'sidebar' => array(
				'label' => 'Sidebar',
				'help' => 'Add content to the sidebar',
				'required' => true,
				'type' => 'templates',
			),
		),
	);
});


/**
 *
 * Get the variables needed to resolve the view
 *
 */
Route::get('/views/{view}', function($view)
{
	$contents = file_get_contents(View::make($view)->getPath());
	$pattern = '/{{{? \$([a-zA-Z0-9]+)/';

	preg_match_all($pattern, $contents, $matches);

	$vars = array();
	foreach($matches[1] as $var) {
		$vars[$var] = array(
			'required' => true,
		);
	}
	return $vars;
});


Route::get('/contracts/news', 'NewsController@indexContract');
Route::options('/news/create', 'NewsController@createContract');




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


Route::post('texteditor', function() {

	return '---' . Input::get('text') . '---';
});


