<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laravel Testing</title>
		{{HTML::style('css/main.css')}}
	</head>
	<body>

		<!-- =========== header layout ========= -->
		<header>
			@section('sidebar')
				d;fa'dfsahf
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