<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Chatty</title>
	<!-- Latest compiled and minified CSS -->
	<link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
	@include('templates.partials.navigation')

	<div class="container">
		@include('templates.partials.alerts')

		@yield('content')

	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('dist/js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

</body>

</html>