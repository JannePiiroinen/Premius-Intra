/**
 * initMap
 *
 * Renders a Google Map
 */
let initMap = function() {

	let maps = document.querySelectorAll('.map');
	
	maps.forEach(mapEl => {

		// Find marker elements within map.
		let markers = mapEl.querySelectorAll('.marker');

		// Create map.
		let mapArgs = {
			zoom : mapEl.dataset.zoom || 17,
			scrollwheel : false,
			mapTypeControl: false,
			mapId: '4b4a6f8fca72ca14',
			fullscreenControl: false,
		};
		let map = new google.maps.Map( mapEl, mapArgs );

		/*
		let infoWindow = new google.maps.InfoWindow();

		infoWindow.addListener('closeclick', ()=>{
			centerMap( map );
		});
		*/

		// Add markers.
		map.markers = [];

		markers.forEach(markerEl => {

			let content = markerEl.innerHTML;

			// Get position from marker.
			let lat = markerEl.dataset.lat;
			let lng = markerEl.dataset.lng;
			let latLng = {
				lat: parseFloat( lat ),
				lng: parseFloat( lng )
			};

			// Create marker image
			let image = {
				url : vars.templatedir + '/img/map-pin.svg?v=1.0.3',
				scaledSize : new google.maps.Size(98, 60),
				// origin: new google.maps.Point(0, 0),
				// anchor: new google.maps.Point(16, 32)
			}
			
			// Create marker instance.
			let marker = new google.maps.Marker({
				position : latLng,
				map: map,
				icon : image,
				optimized : false,
				animation: google.maps.Animation.DROP
			});

			// Append to reference for later use.
			map.markers.push( marker );

			// Show info window when marker is clicked.
			google.maps.event.addListener(marker, 'click', function() {
				// map.panTo(marker.position);
				map.setZoom(16);
				// infoWindow.setContent( content );
				// infoWindow.open( map, marker );

			});

			if( markers.length == 1){
				google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
					// map.panTo(marker.position);
					// infoWindow.setContent( content );
					// infoWindow.open( map, marker );
				});
			}

		});

		// Center map based on markers.
		centerMap( map );

		// Return map instance.
		return map;

	});

}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date	22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

	// Create map boundaries from all map markers.
	let bounds = new google.maps.LatLngBounds();
	map.markers.forEach(function( marker ){
		bounds.extend({
			lat: marker.position.lat(),
			lng: marker.position.lng()
		});
	});

	// Case: Single marker.
	if( map.markers.length == 1 ){
		map.setCenter( bounds.getCenter() );

	// Case: Multiple markers.
	} else{
		map.fitBounds( bounds );
	}
}

// Render maps on page load.
window.addEventListener('DOMContentLoaded', (event) => {
	let map = initMap();
});

// Initialize dynamic block preview (editor).
window.addEventListener('DOMContentLoaded', (event) => {
	if( window.acf ) {
		window.acf.addAction( 'render_block_preview/type=gmaps', initMap );
	}
});