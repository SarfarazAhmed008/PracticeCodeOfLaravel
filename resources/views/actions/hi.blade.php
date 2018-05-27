@extends ('layouts.master')



@section ('hello-head')

	<title>{{ $action }}</title>

@endsection

@section ('hello')

	<p> {{ $action }} </p>
	<p>Message: {{ $message ? $message : 'No Message' }}</p>
	<a href="{{route('say')}}">Go back</a>

@endsection
