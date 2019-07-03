<!doctype html>
<html>
  <head>
    <title>Google Maps Example</title>
    <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
  </head>
  <body>
    <div class="container">
      <h1>PubNub Google Maps Tutorial - Live Flight Path</h1>
      <div id="map-canvas" style="width:600px;height:400px"></div>
    </div>

    <script>
//    $.get("/trackf.php?fl=KE542&mode=lat", function(data_lat, status){ return data_lat;});
//    $.get("/trackf.php?fl=KE542&mode=lng", function(data_lng, status){ return data_lng;});
window.lat=3;
window.lng=2;
    var map;
    var mark;
    var lineCoords = [];
      
    var initialize = function() {
      map  = new google.maps.Map(document.getElementById('map-canvas'), {center:{lat:lat,lng:lng},zoom:12});
      mark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map});
    };

    window.initialize = initialize;

    var redraw = function(payload) {
      lat = payload.message.lat;
      lng = payload.message.lng;

      map.setCenter({lat:lat, lng:lng, alt:0});
      mark.setPosition({lat:lat, lng:lng, alt:0});
      
      lineCoords.push(new google.maps.LatLng(lat, lng));

      var lineCoordinatesPath = new google.maps.Polyline({
        path: lineCoords,
        geodesic: true,
        strokeColor: '#2E10FF'
      });
      
      lineCoordinatesPath.setMap(map);
    };

    var pnChannel = "map3-channel";

    var pubnub = new PubNub({
      publishKey:   'YOUR_PUB_KEY',
      subscribeKey: 'YOUR_SUB_KEY'
    });

    pubnub.subscribe({channels: [pnChannel]});
    pubnub.addListener({message:redraw});

    setInterval(function() {

      pubnub.publish({channel:pnChannel, message:{lat:window.lat + 0.001, lng:window.lng + 0.01}});
    }, 2000);
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA0MvgdrHwZ3oeu1W6EzjZla6macjl5KpY&callback=initialize"></script>
  </body>
</html>

