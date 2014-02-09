<!DOCTYPE html>
<html lang="en" ng-app="sampleApp">

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
			@include('includes.header')
		</footer>

	</body>
	
	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.11/angular.min.js'); }}
	{{ HTML::script('packages/main.js'); }}

</html>