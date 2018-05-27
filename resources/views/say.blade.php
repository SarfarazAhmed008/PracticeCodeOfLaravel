@extends('layouts.master')


@section ('head')

<title>Say hello !</title>

@endsection

@section ('content')

   <script src = "//code.jquery.com/jquery-1.12.0.min.js">
      </script>


	<div style="text-align: center;">
		@foreach($actions as $action)
			<a href="{{ route('actions', ['action' => lcfirst($action->type)] ) }}">{{ $action->type }}</a>

		@endforeach

<!-- 	<a href="{{ route('actions', ['action' => 'hi'] )}}">Hi</a>
		<a href="{{ route('actions', ['action' => 'bye'] )}}">Bye</a>
		<a href="{{ route('actions', ['action' => 'wlcm'] )}}">Welcome</a> -->
	</div>

	<br><br><hr>
	
		@if (count($errors) > 0)
			<div>
				@foreach ($errors->all() as $error)
					<p style="color: red">{{ $error }}</p>
				@endforeach
			<div>
		@endif

<!-- 	<form action="" method="post">
		<input type="text" name="name" placeholder="Enter your name"><br>
		<input type="text" name="age" placeholder="Enter your age"><br>
		<button type="submit" name="submit">Hello !</button>
		<input type="hidden" name="_token" value="{{ Session::token() }}">

	</form> -->

	<form action="{{ route('add_action') }}" method="post">
		<label for="type">Enter action types: </label>
		<input type="text" name="type" placeholder="Enter action type"><br>
		<label for="niceness">Enter niceness: </label>
		<input type="text" name="niceness" placeholder="Enter niceness"><br>
		<button type="submit" onclick="send(event)">Post !</button>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form><br>
	<a href="{{ route('edit_actions') }}">Edit Actions </a>

	@foreach($logged_actions as $logged_action)
		<p style="text-align: center;">		
			{{ $logged_action->hello->type }}
			-------
			@foreach($logged_action->hello->categories as $category)
				{{ $category->name }}
			@endforeach

		</p>
	@endforeach
<!-- 	{!! $logged_actions->links() !!} -->

	@if($logged_actions->lastPage() > 1)
		<div style="text-align: center;">
			@for($i = 1; $i <= $logged_actions->lastPage(); $i++)
				<a href="{{ $logged_actions->url($i) }}">Page: {{ $i }}</a>
			@endfor
		</div>	
	@endif
	
	<script type="text/javascript">
		function send(event) {
			event.preventDefault();
			$.ajax({
				type : "POST",
				url : "{{ route('add_action') }}",
				data : {type : $("#type").val(), niceness : $("#niceness").val(), _token : "{{ Session::token() }}"}
			});
		}
	</script>

@endsection