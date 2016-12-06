//style downloaded from https://snazzymaps.com/

            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
       		
            function init() {
                // Basic options for a simple Google Map
				
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,
					 scrollwheel: false,
					 navigationControl: false,
                     mapTypeControl: false,
					 scaleControl: false,
				    // draggable: false,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(49.187180266, 16.61616683),  //Brno

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType": "road", "stylers":[{"hue":"#5e00ff"},{"saturation": -79}]},
					{"featureType": "poi", "stylers":[{"saturation": -78},{"hue": "#6600ff"},{"lightness": -47},{"visibility": "off"}]},
					{"featureType": "road.local", "stylers":[{"lightness": 22}]},
					{"featureType": "landscape", "stylers": [{"hue": "#6600ff"},{"saturation": -11}]},
    {
        "featureType": "water",
        "stylers": [
            {
                "saturation": -65
            },
            {
                "hue": "#1900ff"
            },
            {
                "lightness": 8
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "weight": 1.3
            },
            {
                "lightness": 30
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#5e00ff"
            },
            {
                "saturation": -16
            }
        ]
    },
     {"featureType": "transit.line",
        "stylers": [
            {
                "saturation": -72
            }
        ]
    }]
};

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(49.187117155, 16.616156101),
                    map: map,
                    title: 'FAIT Gallery'
                });
				
			}