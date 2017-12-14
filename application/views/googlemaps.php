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
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsz-510TWD-3YHaQkU7mNQbNTSdCmibYQ"></script>
	<!--script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsz-510TWD-3YHaQkU7mNQbNTSdCmibYQ&callback=initMap"></script-->
	
<input type="hidden" name="lat" id="lat"/>
<input type="hidden" name="lng" id="lng"/>