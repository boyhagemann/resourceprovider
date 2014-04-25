<?php

class NewsController extends BaseController
{
	public function index()
	{
		return News::all();
	}

	public function indexContract()
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
	}

	public function createContract()
	{
		return array(
			'method' => 'POST',
			'action' => 'http://localhost/marketplace/public/invoke/12345newsstore',
			'elements' => array(
				'title' => array(
					'contract' => 'string',
					'required' => true,
				),
				'body' => array(
					'contract' => 'text',
					'required' => true,
				),
			),
		);
	}

	public function store()
	{
		News::create(Input::all());

		return Response::json(array('message' => 'success'));
	}

}
