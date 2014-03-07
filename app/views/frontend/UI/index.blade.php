@extends('layouts.front-end.default')


@section('content')

	<div id="UI" ng-controller="UITestingCtrl">


		<ul class="nav nav-tabs" id="myTab">
		  	<li><a href="#Content3D" data-toggle="tab">Flip 3D</a></li>
		  	<li><a href="#slideScroll" data-toggle="tab">Slide & Scroll</a></li>
		  	<li class="active"><a href="#sticky" data-toggle="tab">Sticky Element</a></li>
		  	<li><a href="#map" data-toggle="tab">Map Box</a></li>
		  	<li><a href="#Other" data-toggle="tab">Other</a></li>
		</ul>

		<div class="tab-content">

			<!-- =============== flip 3d content ============= -->
		  	<div class="tab-pane fade" id="Content3D">
				<div class="row">
					<a href="http://s3.jt.io/tilt/index.html">Title Photo In Paper Facebook App</a>
					<h4 class="col-lg-12">3D Switch Content</h4>
					<div class="col-lg-4 col-lg-offset-4">
						<div class="box">
							<header>
								<h3>Sumsung Tab 10</h3>
							</header>
							<article class="photo">
								<img src="img/content/product1.jpg" alt="product1">
							</article>
							<footer>
								<ul>
									<li>Price : $786</li>
									<li>Color : White</li>
									<li>Type : New</li>
								</ul>
							</footer>
						</div>
						<div class="box-back">
							<header>
								<h3>Sumsung Tab 10</h3>
							</header>
							<article class="photo">
								<img src="img/content/4.jpg" alt="product1">
							</article>
							<footer>
								<ul>
									<li>Price : $786</li>
									<li>Color : White</li>
									<li>Type : New</li>
								</ul>
							</footer>
						</div>
					</div>
				</div>
				<br>
				<div class="text-center">
					<button id="flipNow">Flip Now</button>
				</div>
		  	</div>

		  	<!-- ================ slide and scroll ============= -->
		  	<div class="tab-pane fade " id="slideScroll">
		  		<h4>Owl Plugin</h4>
				<div id="owl-example" class="owl-carousel">
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				  <div><img src="img/content/product1.jpg" alt="product1"></div>
				</div>
		  	</div>

			<!-- ================ sticky element =============== -->
		  	<div class="tab-pane in active fade" id="sticky">
		  		<div>
		  			<img src="img/dark-batman.jpg" alt="banner">
		  			<img src="img/dark-batman.jpg" alt="banner">
		  		</div>
				<!-- <div class="needToFixed" data-spy="affix" data-offset-top="260" data-offset-bottom="106"> -->
				<div class="needToFixed">
			  		<div class="box row">
			  			<div class="col-xs-3">
			  				<div class="item">
			  					&nbsp;
			  				</div>
			  			</div>
			  			<div class="col-xs-3">
			  				<div class="item">
			  					&nbsp;
			  				</div>
			  			</div>
			  			<div class="col-xs-3">
			  				<div class="item">
			  					&nbsp;
			  				</div>
			  			</div>
			  			<div class="col-xs-3">
			  				<div class="item">
			  					&nbsp;
			  				</div>
			  			</div>
			  		</div>
				</div>
		  	</div>

		  	<div class="tab-pane in active fade" id="map">

		  		<h4>Basic map with center on click marker</h4>
		  		<div class="Basic">
					<div id="test1" class="mymap">
					</div>
		  		</div>

		  		<h4>Basic map with customize popup</h4>
		  		<div class="Basic">
					<div id="test2" class="mymap">
					</div>
		  		</div>

		  	</div>

		  	<!-- ================= other style ================= -->
		  	<div class="tab-pane fade " id="Other">
		  		<div class="paperCurls">
		  			<h4>Shadow Paper Curls</h4>
		  			<div class="box">

		  			</div>
		  		</div>
		  	</div>
		</div>

	</div>

	<!-- <input id="test" type="text" value="" placeholder="please input"> -->
	
@stop

@section('sidebar')

@stop