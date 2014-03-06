@extends('layouts.front-end.default')


@section('content')

	<div id="UI">


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

	<script type="text/javascript">
		$(function(){
			var myWindow=$(window);
			$('#flipNow').click(function(){
				$('.box').toggleClass('flip');
				$('.box-back').toggleClass('flip');
			})
			$("#owl-example").owlCarousel();

			var myoffsetTop;
			setTimeout(function(){
				myoffsetTop=$('.needToFixed .box').offset().top-myWindow.height()+200;
				// alert(myoffsetTop);
			    $('.needToFixed .box').affix({
			        offset: { top: myoffsetTop}
			    });
			},1000);

		})
	</script>


	<script src='https://api.tiles.mapbox.com/mapbox.js/v1.6.1/mapbox.js'></script>
	<script type="text/javascript">
		
		var map1=L.mapbox.map('test1','panhna.hb1678dj').setView([11.562, 104.923],14);

		// ================== show information of marker popup and centering ==================
		map1.featureLayer.on('click', function(e) {
		    map1.panTo(e.layer.getLatLng());
		})
    
	</script>


<script type="text/javascript">
	var map2 = L.mapbox.map('test2', 'panhna.hb1678dj');

	var geoJson = [{
	    type: 'Feature',
	    "geometry": { "type": "Point", "coordinates": [104.91621494293213,11.570810601849024]},
	    "properties": {
	        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Cherry_Blossoms_and_Washington_Monument.jpg/320px-Cherry_Blossoms_and_Washington_Monument.jpg",
	        "url": "https://en.wikipedia.org/wiki/Washington,_D.C.",
	        "marker-symbol": "star",
	        "city": "Washington, D.C.",
	        'marker-symbol':'pitch',
	        'marker-color':'#a3e46b'
	    }
	}, {
	    type: 'Feature',
	    "geometry": { "type": "Point", "coordinates": [104.91213798522949,11.558407583155011]},
	    "properties": {
	        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Chicago_sunrise_1.jpg/640px-Chicago_sunrise_1.jpg",
	        "url": "https://en.wikipedia.org/wiki/Chicago",
	        "city": "Chicago",
	        'marker-symbol':'city',
	        'marker-color':'#a3e46b'
	    }
	}, {
	    type: 'Feature',
	    "geometry": { "type": "Point", "coordinates": [104.89076614379883,11.56883456448188]},
	    "properties": {
	        "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/NYC_Top_of_the_Rock_Pano.jpg/640px-NYC_Top_of_the_Rock_Pano.jpg",
	        "url": "https://en.wikipedia.org/wiki/New_York_City",
	        "city": "New York City",
	        'marker-symbol':'college',
	        'marker-color':'#a3e46b'
	    }
	}];

	map2.featureLayer.on('click', function(e) {
	    map2.panTo(e.layer.getLatLng());
	})

	// Add custom popups to each using our custom feature properties
	map2.featureLayer.on('layeradd', function(e) {
	    var marker = e.layer,
	        feature = marker.feature;

	    // Create custom popup content
	    var popupContent =  '<a target="_blank" class="popup" href="' + feature.properties.url + '">' +
	                            '<img src="' + feature.properties.image + '">' +
	                        '   <h2>' + feature.properties.city + '</h2>' +
	                        '<p>testing tooltips</p>'+
	                        '</a>';

	    // http://leafletjs.com/reference.html#popup
	    marker.bindPopup(popupContent,{
	        closeButton: false,
	        minWidth: 320
	    });
	});

	// Add features to the map
	map2.featureLayer.setGeoJSON(geoJson);

	map2.setView([11.562, 104.923],14);
</script>

@stop

@section('sidebar')

@stop