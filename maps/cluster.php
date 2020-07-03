<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Clustering</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        
        height: 70%;
        
        margin-left: 20%;
        width:60%;
        border:double white 1px;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
      } 
      body {
        background-image: url(image/unnamed\ \(1\).jpg);
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .name{
        
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        font-size:25px;
        font-family: 'Times New Roman', Times, serif;
       background: transparent;
       height: 10%;
      }
      a {
       text-align: center;
       text-decoration: none;
       display: inline-block;
       color: rgb(247, 235, 235);
       font-family: 'Times New Roman', Times, serif;
       font-weight: 300;
       font-size: 20px;
       outline: none;
       margin-top: 25px;
       padding-right: 30px;
       border-style: double;
       border-radius: 20px;

      }
      a.hover{
        color: white;
      }
    </style>
  </head>
  <body>
    <a class="btn btn-full" href="http://localhost/test/project/maps/authenticate_user.php#exit() "style = margin-left:20px; >Back</a>
  <center><span class="name">Clustred Crime Areas </span></center>
   <div id="map"></div>
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat:21.146633, lng: 79.088860}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'MMRRRTKKk';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
        {lat: 24.288309, lng: 79.384193},
        {lat: 24.253260, lng: 79.466591},
        {lat: 24.299580, lng:78.527260},
        {lat: 24.134260, lng: 79.601173},
        {lat:21.383949, lng: 79.751419},
        {lat: 21.014481, lng: 79.372742},
        {lat: 21.145350, lng: 78.994789},
        {lat: 21.080021, lng: 79.076500},
        
      ]
    </script>
    <!-- Replace following script src -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjz2DvbFISpBY8kdYtV0XKF0AIb2glGz0&callback=initMap">
    </script>
    

  </body>
</html>