<!DOCTYPE html>
<html>
<head>
	<title>lara crud</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<h2>Create a product</h2><br>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><br>
		@endif
		@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div><br>
		@endif
		<form method="post" action="{{url('products')}}">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="name"> Name: </label>
					<input type="text" name="name" class="form-control">
				</div>

			</div>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<label for="price"> Price: </label>
					<input type="text" name="price" class="form-control">
				</div>

			</div>


			<div class="row">
				<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<button type="submit" class="btn btn-success" style="margin-left: 38px">Add Product</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>