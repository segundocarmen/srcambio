<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Cambilo') }}</title>
	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/bundle/Cambilo.css') }}">
	<link rel="stylesheet" href="{{ asset('css/basics.css') }}">
</head>
<body>
	<div id="app">
		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" ></script>
	<script src="{{ asset('js/Aplication.js') }}" ></script>
</html>