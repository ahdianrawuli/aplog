<?php

$fl	= $_GET['fl'];
$mode	= $_GET['mode'];
$content =     file_get_contents("https://www.flightradar24.com/v1/search/web/find?query=$fl&limit=1");

$result  = json_decode($content);
$id = $result->results[0]->id;
$content =     file_get_contents("https://data-live.flightradar24.com/zones/fcgi/feed.js?bounds=59.48,58.84,6.74,13.88&faa=1&mlat=1&flarm=1&adsb=1&gnd=1&air=1&vehicles=1&estimated=1&maxage=14400&gliders=1&stats=1&selected=$id&ems=1");
$result  = json_decode($content);
$map = $result->$id;

if ($mode == "lat")
	{
	echo $map[1];
	}
else if ($mode=="lng")
	{
	echo $map[2];
	}

?>
