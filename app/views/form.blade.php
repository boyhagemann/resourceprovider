<h1>{{ $title }}</h1>

{{ Form::open(array('url' => $action, 'method' => $method)) }}

@foreach($elements as $name => $element)

	{{ Form::text($name) }}

@endforeach


{{ Form::submit('Save') }}

{{ Form::close() }}