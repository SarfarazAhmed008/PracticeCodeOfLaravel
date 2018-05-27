<!DOCTYPE html>
<html>
<head>
	<title>Index page</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
	<br>
	@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>

		</div> <br>
	@endif
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
			<tr>
				<td>{{$product['id']}}</td>
				<td>{{$product['name']}}</td>
				<td>{{$product['price']}}</td>
				<td><a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-warning">Edit</a></td>

				<td>
					<form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
						{{ csrf_field() }}

						<input type="hidden" name="_method" value="DELETE">
						<button class="btn btn-danger" type="submit">Delete</button>

					</form>
				</td>

			</tr>
			@endforeach

		</tbody>
	</table>



	</div>
</body>
</html>