<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Laravel Testing</title>
		{{HTML::style('css/main.css')}}

		{{HTML::script('packages/requirejs/require.js',array("data-main"=>"packages/requirejs/main"))}}
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
		<section>

			@yield('content')
		</section>

		<!-- =========== footer ========== -->
		<footer>
			@include('includes.header')
		</footer>

	</body>
	
</html>