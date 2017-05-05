        
        <?php require_once 'View/google-map/googlemaplinkconvert.php';
            //$longlat = getLatLong();
            if($pageList[0]["GoogleMapsLink"] != "") {
                $url = $pageList[0]["GoogleMapsLink"];
            }
            else {
                $url = "https://www.google.com.tr/maps/search/siteler/@39.945089,32.9023899,13.25z";
            }
            
        ?>
        <style type="text/css">
            
            #map {
                width: 100%;
                height: 60vh;
                position:relative;
            }

        </style>
        <div id="map"></div>
        <script>
          function initMap() {
            $url = '<?php echo $url;?>';

            $urlParts = $url.split( '/' );
            $getLatLng = $urlParts[6].replace('@','');
            $getLatLng = $getLatLng.split( ',' );
              
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: parseFloat($getLatLng[0]), lng: parseFloat($getLatLng[1])},
                zoom: 14
            });

            var marker = new google.maps.Marker({
                position: {lat: parseFloat($getLatLng[0]), lng: parseFloat($getLatLng[1])},
                map: map,
                title: ''
              });
          }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQUvG4zSF5Ct5ogXx8kc4UWga0vAfB504&callback=initMap">
        </script>       
