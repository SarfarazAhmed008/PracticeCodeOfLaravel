@extends ('layouts.master')



@section ('hello-head')

	<title></title>

@endsection

@section ('hello')

	<h2>From new view</h2>
	@if (count($errors) > 0)
		@foreach ($errors->all() as $error)
			<p style="color: red;">{{ $error }}</p>
		@endforeach
	@endif

	<form action="{{ route('edit') }}" method="post">

	@foreach ($actions as $action)
		<label for="type">Action type: </label>
		<input type="text" name="type" placeholder="Enter action type" value="{{ $action->type }}"><br>
		<label for="niceness">Niceness: </label>
		<input type="text" name="niceness" placeholder="Enter niceness" value="{{ $action->niceness }}"><br><br>
	@endforeach
	
		<button type="submit" name="edit">Edit</button><br><br>
		<input type="hidden" name="_token" value="{{ Session::token() }}">	
	</form>
	<a href="{{route('say')}}">Go back</a>
@endsection


