<!DOCTYPE html>
<html>
<head>
	<title>Guestbook</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	<div id="#guestBook">
		<article v-repeat="message">
			<h3>@{{name}}</h3>
			<div class="body">
				@{{message}}
			</div>
		</article>

		<pre>@{{ $data | json }}</pre>
	</div>

	<script src="/js/vendor.js"></script>
	<script src="/js/guestbook.js"></script>
</body>
</html>