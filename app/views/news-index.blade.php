<h1>{{{ $title or "News" }}}</h1>

@foreach($news as $item)
	<article>
		<header><h1>{{{ $item['title'] }}}</h1></header>
		<p>{{ $item['body'] }}</p>
	</article>
@endforeach