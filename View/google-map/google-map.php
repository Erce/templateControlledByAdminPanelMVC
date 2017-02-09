        
        
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
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 39.895657, lng: 32.684469},
                zoom: 14
            });

            var marker = new google.maps.Marker({
                position: {lat: 39.895657, lng: 32.684469},
                map: map,
                title: 'Erce Can Balcıoğlu'
              });
          }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQUvG4zSF5Ct5ogXx8kc4UWga0vAfB504&callback=initMap">
        </script>       
