<div id="map" style="height:100%"></div>
	<script>
		var marker = undefined;
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: {lat: -6.242678, lng: 106.991884 }
			});
			
			placeMarkerAndPanTo(map.getCenter(), map);

			map.addListener('click', function(e) {
				placeMarkerAndPanTo(e.latLng, map);
			});
		}

		function placeMarkerAndPanTo(latLng, map) {
			if (marker === undefined)
			{
				marker = new google.maps.Marker({
					position: latLng,
					map: map
				});
			}
			else
			{
				marker.setPosition(latLng);
				marker.setMap(map);
			}
			
			//map.panTo(latLng);
			
			document.getElementById('lat').value = latLng.lat();
			document.getElementById('lng').value = latLng.lng();
			
			var geocoder = new google.maps.Geocoder;
			geocoder.geocode({'location': latLng}, function(results, status) {
				if (status === 'OK') {
					if (results[0]) {
						var route = "";
						var street_number = "";
						var neighborhood = "";
						var sublocality = "";
						var administrative_area_level_2 = "";
						var administrative_area_level_1 = "";
						var country = "";
						var postal_code = "";
						results[0]['address_components'].forEach(function(item, idx){
							if (item['types'].indexOf('route') >= 0) route = item['long_name'];
							else if (item['types'].indexOf('street_number') >= 0) street_number = item['long_name'];
							else if (item['types'].indexOf('neighborhood') >= 0) neighborhood = item['long_name'];
							else if (item['types'].indexOf('sublocality') >= 0) sublocality = item['long_name'];
							else if (item['types'].indexOf('administrative_area_level_2') >= 0) administrative_area_level_2 = item['long_name'];
							else if (item['types'].indexOf('administrative_area_level_1') >= 0) administrative_area_level_1 = item['long_name'];
							else if (item['types'].indexOf('country') >= 0) country = item['long_name'];
							else if (item['types'].indexOf('postal_code') >= 0) postal_code = item['long_name'];
						});
						document.getElementById('address_detail').value = route + " " + (street_number ? "No. " + street_number : "");
						check_address_detail();
					} else {
						console.log('No results found');
					}
				} else {
					console.log('Geocoder failed due to: ' + status);
				}
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsz-510TWD-3YHaQkU7mNQbNTSdCmibYQ"></script>
	<!--script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsz-510TWD-3YHaQkU7mNQbNTSdCmibYQ&callback=initMap"></script-->
	
<input type="hidden" name="lat" id="lat"/>
<input type="hidden" name="lng" id="lng"/>