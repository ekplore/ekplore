<?php
if(isset($_GET["zip"]))
	$zip = $_GET["zip"];
else if(isset($azip))
	$zip=$azip;
else
{
	
//echo $res;

//Get the zip.
$ch1 = curl_init();

// set URL and other appropriate options
curl_setopt($ch1, CURLOPT_URL, "http://beta.ekplore.com/getzip.php");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$zip = curl_exec($ch1);
//echo $zip . "<br />";
}

// Get Lat for zip
$lt = curl_init();
curl_setopt($lt, CURLOPT_URL, "http://beta.ekplore.com/zipcode.php?zip=".$zip."&lat=1");
curl_setopt($lt, CURLOPT_RETURNTRANSFER, 1);
$lat = curl_exec($lt); 

//Get Long for zip
$lon = curl_init();
curl_setopt($lon, CURLOPT_URL, "http://beta.ekplore.com/zipcode.php?zip=".$zip."&lng=1");
curl_setopt($lon, CURLOPT_RETURNTRANSFER, 1);
$lng = curl_exec($lon);



// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/v1/media/search?lat=".$lat."&lng=".$lng."&client_id=d6a18f1757a9475b85c89eb4a180805b");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$res = curl_exec($ch);

$decoded = json_decode($res, true);
$count = count($decoded['data']);

//var_dump($decoded);

if($count>1)
	for($i=0; $i<$count;$i++){
		echo "<div class=\"singlePhoto\">";
		echo "<a href=\"".$decoded['data'][$i]['link']."\">";
		echo "<img src="."\"".$decoded['data'][$i]['images']['standard_resolution']['url']."\"/></a>";
		echo "</div>";
	}
else
{
	$nocount = 1;
}
curl_close($ch);
curl_close($ch1);
?>