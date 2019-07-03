<?php

$fl	= $_GET['fl'];
#$fl = "LNI715";
$content =     file_get_contents("https://www.flightradar24.com/v1/search/web/find?query=$fl&limit=1");

$result  = json_decode($content);
$id = $result->results[0]->id;
$content =     file_get_contents("https://data-live.flightradar24.com/zones/fcgi/feed.js?bounds=59.48,58.84,6.74,13.88&faa=1&mlat=1&flarm=1&adsb=1&gnd=1&air=1&vehicles=1&estimated=1&maxage=14400&gliders=1&stats=1&selected=$id&ems=1");
$result  = json_decode($content);
$map = $result->$id;

?>

<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 400px;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru

  var uluru = {lat: <?php echo $map[1];?>, lng: <?php echo $map[2];?>};

var mapOptions = {
  zoom: 12,
  center: uluru,
  mapTypeId: 'satellite'
};


//  var map = new google.maps.Map(
//      document.getElementById('map'), {zoom: 12, center: uluru});
  var map = new google.maps.Map(
      document.getElementById('map'), mapOptions);

var icon = {
    url: "https://cdn.iconscout.com/public/images/icon/free/png-256/aeroplane-airplane-plane-air-transportation-vehicle-pessanger-people-emoj-symbol-3306ff886517b0e9-256x256.png",
    scaledSize: new google.maps.Size(30, 30), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};

  var marker = new google.maps.Marker({
    position: uluru,
    map: map,
    icon: icon
  });

}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0MvgdrHwZ3oeu1W6EzjZla6macjl5KpY&callback=initMap">
    </script>
  </body>
</html>
