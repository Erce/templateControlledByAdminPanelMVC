        
        <?php require_once 'View/google-map/googlemaplinkconvert.php';
            //$longlat = getLatLong();
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
            $url = 'https://www.google.com.tr/maps/place/Etlik,+Ayval%C4%B1+Cd.+No:126,+06010+Ke%C3%A7i%C3%B6ren%2FAnkara/@39.979953,32.8209293,17z/data=!3m1!4b1!4m5!3m4!1s0x14d34c11028fad91:0xf3b8520e023156b9!8m2!3d39.979953!4d32.823118';

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
