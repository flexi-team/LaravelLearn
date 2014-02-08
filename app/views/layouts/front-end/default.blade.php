<!DOCTYPE html>
<html lang="en">
<head>
	<title>Laravel Testing</title>
	{{HTML::style('css/main.css')}}
</head>
<body>

	<!-- =========== header layout ========= -->
	<header>
		@include('includes.header')
	</header>	

	<!-- =========== content layout ======== -->
	<section>
		@yield('content')
	</section>

	<!-- =========== footer ========== -->
	<footer>
		@include('includes.footer')
	</footer>

</body>
	
</html>