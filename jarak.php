<input type="text" id="dest" style="width:500px;">
  		<button type="button" id="cari">Cari Rute</button>
  		<br><br>
	    <div id="directions-panel" style="float:right; width:48%; height:600px; overflow:auto;"></div>
	    <div id="map-canvas" style="width:50%; height:600px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&language=id&key=AIzaSyCox-VYiQFDImh0WZVv23v8ZnTlo4Ug-FI"></script>
<script src="jquery.js"></script>
    <script>
    var dest;
    var directionsDisplay;

    // memanggil service Google Maps Direction
	var directionsService = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer();

    $(document).ready(function() {
        var myOptions = {
            zoom: 4,
            center: new google.maps.LatLng(-2.548926,118.0148634),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // posisi awal ketika halaman pertama kali dimuat
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

        // memanggil fungsi geocoder autocomplete
        var autocomplete = new google.maps.places.Autocomplete((document.getElementById('dest')),{ types: ['geocode'] });
    	
    	/*	
    		fungsi geolocation pada geocoder ini sangat penting
    		agar pencarian daerah tujuan pada textbox ga ngaco 
    	*/
    	if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(function(position) {
            	var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            	autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,geolocation));
        	});
    	}

	});

	$(document).ready(function() {
		// ketika tombol cari di klik, maka proses pencarian rute dimulai
		$("#cari").click(function(){

			dest = $("#dest").val();

			var defaultLatLng = new google.maps.LatLng(-2.548926,118.0148634);

			/*	
				nah, pada fungsi geolocation disini adalah
				ketika koordinat user berhasil didapat maka peta koordinat yang digunakan
				adalah koordinat user, namun jika tidak berhasil maka koordinat yang digunakan
				adalah koordinat default (pada variable defaultLatLng)
			*/
		    if (navigator.geolocation) {
		        function success(pos) {
		            drawMap(pos.coords.latitude,pos.coords.longitude);
		        }

		        function fail(error) {
		            drawMap(defaultLatLng);
		        }
		        
		        navigator.geolocation.getCurrentPosition(success, fail, { maximumAge: 500000, enableHighAccuracy:true, timeout: 6000 });

		    } else {
		        drawMap(defaultLatLng);  
		    }

		    function drawMap(lat,lng) {

		        var myOptions = {
		            zoom: 15,
		            center: new google.maps.LatLng(lat,lng),
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		        };

		        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

		        // kita bikin marker untuk asal dengan koordinat user hasil dari geolocation
		        var markerorigin = new google.maps.Marker({
	                position: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
	                map: map,
	                title: "Origin",
	                visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
				});

		        // membuat request ke Direction Service
		        var request = {
					origin: markerorigin.getPosition(), // untuk daerah asal, kita ambil posisi user
				    destination: dest, // untuk daerah tujuan, kita ambil value dari textbox tujuan
				    provideRouteAlternatives:true, // set true, karena kita ingin menampilkan rute alternatif

				    /**
				     * kamu bisa tambahkan opsi yang lain seperti
				     * avoidHighways:true (set true untuk menghindari jalan raya, set false untuk menonantifkan opsi ini)
				     * atau kamu bisa juga menambahkan opsi seperti
				     * avoidTolls:true (set true untuk menghindari jalan tol, set false untuk menonantifkan opsi ini)
				     */
				    travelMode: google.maps.TravelMode.DRIVING // set mode DRIVING (mode berkendara / kendaraan pribadi)
				    /**
				     * kamu bisa ganti dengan 
				     * google.maps.TravelMode.BICYCLING (mode bersepeda)
				     * google.maps.TravelMode.WALKING (mode berjalan)
				     * google.maps.TravelMode.TRANSIT (mode kendaraan / transportasi umum)
				     */
				};


				directionsService.route(request, function(response, status) {
				    if (status == google.maps.DirectionsStatus.OK) {
				      directionsDisplay.setDirections(response); 
				    }
			  	});
				// menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
			  	directionsDisplay.setMap(map);
		  		directionsDisplay.setPanel(document.getElementById('directions-panel'));
		  		
		  		// menampilkan layer traffic atau lalu-lintas pada peta
		  		var trafficLayer = new google.maps.TrafficLayer();
  				trafficLayer.setMap(map);

		    }
		});
	});
    </script>