@extends ('layouts.master')



@section ('hello-head')

	<title>Hello !</title>

@endsection

@section ('hello')

	<p> Hello {{ $name }} ! Your age is {{ $age }}. </p>
	<a href="{{route('say')}}">Go back</a>

@endsection
