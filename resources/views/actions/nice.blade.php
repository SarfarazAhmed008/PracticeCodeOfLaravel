@extends ('layouts.master')



@section ('hello-head')

	<title>{{ $action }}</title>

@endsection

@section ('hello')

	<h2>From new view</h2>
	<p> {{ $action }} </p>
	<p>Message: {{ $message }}</p>

	<a href="{{route('say')}}">Go back</a>
@endsection


