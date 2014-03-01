@extends('layouts.front-end.default')


@section('content')

	<div id="UI">


		<ul class="nav nav-tabs" id="myTab">
		  	<li class="active"><a href="#Content3D" data-toggle="tab">Flip 3D</a></li>
		  	<li><a href="#profile" data-toggle="tab">Profile</a></li>
		  	<li><a href="#messages" data-toggle="tab">Messages</a></li>
		  	<li><a href="#settings" data-toggle="tab">Settings</a></li>
		</ul>

		<div class="tab-content">
		  	<div class="tab-pane active" id="Content3D">
				<div class="row">
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
		  	<div class="tab-pane" id="profile">
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
		  	<div class="tab-pane" id="messages">
		  		dfafsf
		  	</div>
		  	<div class="tab-pane" id="settings">
		  		dfadaf
		  	</div>
		</div>

	</div>

	<script type="text/javascript">
		$(function(){
			$('#flipNow').click(function(){
				$('.box').toggleClass('flip');
				$('.box-back').toggleClass('flip');	
			})
			$("#owl-example").owlCarousel();
		})

	</script>

@stop

@section('sidebar')

@stop