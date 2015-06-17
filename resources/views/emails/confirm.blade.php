<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>

	<h1>Thanks for signing up!</h1>

	<p>We just need you to <a href='{{ url("/register/confirm/{$user->token}") }}'>confirm your email address</a> real quick!</p>
</body>
</html>