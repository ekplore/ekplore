<?php

//https://api.foursquare.com/v2/venues/search?ll=44.3,37.2&limit=10&radius=2000&client_id=IOMJZQBHKWLPEVSEEZXZ4SAZ24AFEJHJB4QIPMVRHYMDMATV&client_secret=ZQADY1PBUDSGUTCLOBCLFGTM5XAVRNML5U3N0BZVBXHIGS3K
if(isset($_GET["local"]))
{
	$zip=10019;
	
}

else if(isset($_GET["zip"]))
	$zip = $_GET["zip"];
else if(isset($azip))
	$zip=$azip;
else
{
	
//echo $res;

//Get the zip.
$ch1 = curl_init();

// set URL and other appropriate options
curl_setopt($ch1, CURLOPT_URL, "http://localhost/ekplore/getzip.php");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$zip = curl_exec($ch1);
//echo $zip . "<br />";
}

// Get Lat for zip
$lt = curl_init();
curl_setopt($lt, CURLOPT_URL, "http://localhost/ekplore/zipcode.php?zip=".$zip."&lat=1");
curl_setopt($lt, CURLOPT_RETURNTRANSFER, 1);
$lat = curl_exec($lt); 

//Get Long for zip
$lon = curl_init();
curl_setopt($lon, CURLOPT_URL, "http://localhost/ekplore/zipcode.php?zip=".$zip."&lng=1");
curl_setopt($lon, CURLOPT_RETURNTRANSFER, 1);
$lng = curl_exec($lon);

// curl_close($ch1);
// curl_close($lat);
// curl_close($lon);
?>