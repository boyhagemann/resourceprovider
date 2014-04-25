<?php

class NewsTableSeeder extends Seeder {

	public function run()
	{
		News::create(array(
			'id' => 1,
			'title' => 'First news item',
			'body' => '<h2>Subtitle</h2><p>Text...</p>',
		));

		News::create(array(
			'id' => 2,
			'title' => 'Second news item',
			'body' => '<h2>Subtitle 2</h2><p>Text...</p>',
		));

	}

}