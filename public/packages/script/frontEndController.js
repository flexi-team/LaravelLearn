(function() {

    define([], function() {

        var UITestingCtrl = function($scope) {

            $(function() {
                var myWindow = $(window);
                $('#flipNow').click(function() {
                    $('.box').toggleClass('flip');
                    $('.box-back').toggleClass('flip');
                })
                // $("#owl-example").owlCarousel();

                var myoffsetTop;
                setTimeout(function() {
                    myoffsetTop = $('.needToFixed .box').offset().top - myWindow.height() + 200;
                    // alert(myoffsetTop);
                    $('.needToFixed .box').affix({
                        offset: {
                            top: myoffsetTop
                        }
                    });
                }, 1000);
            })

            // ========================== map ========================
            var map1 = L.mapbox.map('test1', 'panhna.hb1678dj').setView([11.562, 104.923], 14);

            // ================== show information of marker popup and centering ==================
            map1.featureLayer.on('click', function(e) {
                map1.panTo(e.layer.getLatLng());
            })

            var map2 = L.mapbox.map('test2', 'panhna.hb1678dj');

            var geoJson = [{
                type: 'Feature',
                "geometry": {
                    "type": "Point",
                    "coordinates": [104.91621494293213, 11.570810601849024]
                },
                "properties": {
                    "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Cherry_Blossoms_and_Washington_Monument.jpg/320px-Cherry_Blossoms_and_Washington_Monument.jpg",
                    "url": "https://en.wikipedia.org/wiki/Washington,_D.C.",
                    "marker-symbol": "star",
                    "city": "Washington, D.C.",
                    'marker-symbol': 'pitch',
                    'marker-color': '#a3e46b'
                }
            }, {
                type: 'Feature',
                "geometry": {
                    "type": "Point",
                    "coordinates": [104.91213798522949, 11.558407583155011]
                },
                "properties": {
                    "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Chicago_sunrise_1.jpg/640px-Chicago_sunrise_1.jpg",
                    "url": "https://en.wikipedia.org/wiki/Chicago",
                    "city": "Chicago",
                    'marker-symbol': 'city',
                    'marker-color': '#a3e46b'
                }
            }, {
                type: 'Feature',
                "geometry": {
                    "type": "Point",
                    "coordinates": [104.89076614379883, 11.56883456448188]
                },
                "properties": {
                    "image": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/NYC_Top_of_the_Rock_Pano.jpg/640px-NYC_Top_of_the_Rock_Pano.jpg",
                    "url": "https://en.wikipedia.org/wiki/New_York_City",
                    "city": "New York City",
                    'marker-symbol': 'college',
                    'marker-color': '#a3e46b'
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
                var popupContent = '<a target="_blank" class="popup" href="' + feature.properties.url + '">' +
                    '<img src="' + feature.properties.image + '">' +
                    '   <h2>' + feature.properties.city + '</h2>' +
                    '<p>testing tooltips</p>' +
                    '</a>';

                // http://leafletjs.com/reference.html#popup
                marker.bindPopup(popupContent, {
                    closeButton: false,
                    minWidth: 320
                });
            });

            // Add features to the map
            map2.featureLayer.setGeoJSON(geoJson);

            map2.setView([11.562, 104.923], 14);

        }

        // Publish the constructor/construction array
        return ["$scope", UITestingCtrl];

    });
}());