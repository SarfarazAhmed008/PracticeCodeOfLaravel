@extends ('layouts.master')



@section ('hello-head')

	<title>{{ $action }}</title>

@endsection

@section ('hello')

	<p> {{ $action }} </p>
	<p>Message: {{ $message === null ? 'No Message' : $message }}</p>
	<a href="{{route('say')}}">Go back</a>

@endsection
