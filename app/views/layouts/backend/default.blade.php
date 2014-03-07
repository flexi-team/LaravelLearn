<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<title>Backend - OwlStore</title>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="testing laravel"/>
		<meta name="keywords" content="testing laravel"/>
		<meta name="author" content="nexGenDev"/>
		<meta name="developers" content="nexGenDev"/>
		<meta name="developer" content="nexGenDev"/>
		<meta name="contact" content="nexGenDev@gmail.com"/>

		<link href="img/nextGenDev.ico" type="image/x-icon" rel="shortcut icon" />
		{{HTML::style('css/main.css')}}
		<link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.1/mapbox.css' rel='stylesheet' />
		{{HTML::script('packages/requirejs/require.js',array("data-main"=>"packages/requirejs/main.backend"))}} 
	</head>
	<body>

		<!-- =========== header layout ========= -->
		<header>
			@section('sidebar')
				
			@show
			<!-- @yield('sidebar') -->
			@include('includes.header')
		</header>	

		<!-- =========== content layout ======== -->
		<main>
			@yield('content')
		</main>

		<!-- =========== footer ========== -->
		<footer>
			@include('includes.footer')
		</footer>

	</body>
	
</html>