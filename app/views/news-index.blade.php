
<h1>{{{ $title or "News" }}}</h1>

@foreach($news as $item)

	<article class="media">
		<a class="pull-left" href="#">

		</a>
		<div class="media-body">
			<h4 class="media-heading">{{{ $item['title'] }}}</h4>
			<p>{{ $item['body'] }}</p>
		</div>
	</article>
@endforeach