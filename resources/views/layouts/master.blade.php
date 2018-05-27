<!DOCTYPE html>
<html>
<head>
	@yield('head')
	@yield('hello-head')
</head>
<body>
	<div class="Container">
		<h2>Say hello with name</h2>
		@yield('content')
		@yield('hello')
		@include('includes.thank')

	</div>
</body>
</html>