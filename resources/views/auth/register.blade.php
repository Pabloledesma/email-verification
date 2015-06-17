<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	
<h1>Register</h1>

@if (count($errors) > 0)
	<ul class="alert alert-danger">
		@foreach( $errors->all() as $error )
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@if( session()->has('message') )
	
	<div class="alert alert-info">
		{{ session('message') }}
	</div>

@endif

	<form method="post" action="/register">

		{!! csrf_field() !!}

		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
		</div>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default">Register</button>
		</div>
	</form>

</div>
</body>
</html>