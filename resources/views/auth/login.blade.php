@extends('app')

@section('content')

		<h1>Login</h1>
		@include('error')
		<form method="post" action="/login">

			{!! csrf_field() !!}

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">Sign In</button>
			</div>
		</form>


@stop