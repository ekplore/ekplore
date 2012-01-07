<?php

//https://api.foursquare.com/v2/venues/search?ll=44.3,37.2&limit=10&radius=2000&client_id=IOMJZQBHKWLPEVSEEZXZ4SAZ24AFEJHJB4QIPMVRHYMDMATV&client_secret=ZQADY1PBUDSGUTCLOBCLFGTM5XAVRNML5U3N0BZVBXHIGS3K

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
curl_setopt($ch1, CURLOPT_URL, $site_url."getzip.php");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$zip = curl_exec($ch1);
//echo $zip . "<br />";
}

// Get Lat for zip
$lt = curl_init();
curl_setopt($lt, CURLOPT_URL, $site_url."zipcode.php?zip=".$zip."&lat=1");
curl_setopt($lt, CURLOPT_RETURNTRANSFER, 1);
$lat = curl_exec($lt); 

//Get Long for zip
$lon = curl_init();
curl_setopt($lon, CURLOPT_URL, $site_url."zipcode.php?zip=".$zip."&lng=1");
curl_setopt($lon, CURLOPT_RETURNTRANSFER, 1);
$lng = curl_exec($lon);


//Call Twitter.
$four = curl_init();
curl_setopt($four, CURLOPT_URL, "https://api.foursquare.com/v2/venues/search?ll=".$lat.",".$lng."&limit=10&radius=2000&client_id=IOMJZQBHKWLPEVSEEZXZ4SAZ24AFEJHJB4QIPMVRHYMDMATV&client_secret=ZQADY1PBUDSGUTCLOBCLFGTM5XAVRNML5U3N0BZVBXHIGS3K");
curl_setopt($four, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($four);


$venues = json_decode($res, true);
//var_dump($venues);

$jsonurl="https://api.foursquare.com/v2/venues/search?ll=".$lat.",".$lng."&limit=6&radius=2000&client_id=IOMJZQBHKWLPEVSEEZXZ4SAZ24AFEJHJB4QIPMVRHYMDMATV&client_secret=ZQADY1PBUDSGUTCLOBCLFGTM5XAVRNML5U3N0BZVBXHIGS3K";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json, true);

foreach ( $json_output['response']['groups'][0]['items'] as $items )
{
	echo "<div class=\"postBar\">";
	echo "<div class=\"postPhoto\">";
	echo "<img src=\"http://playfoursquare.s3.amazonaws.com/press/logo/icon-512x512.png\"/>";
	echo "</div>";
	echo "<div class=\"postText\">";
     echo "<h1>".$items['name']."</h1>";
	 echo "<p>".$items['location']['address']."<br/>Checkins: ".$items['stats']['checkinsCount']."</p>";
	 echo "</div></div>";
}
/*
for($i=0; $i<count($venues['response']['groups'][0]);$i++){
	//<div class="tweetPhoto"><img src="images/avatar.png">
	$name = $venues['response']['groups'][0]['items']['name'];
	echo "<div class=\"postBar\">";
	echo "<div class=\"postPhoto\">";
	echo "<img src=\"http://playfoursquare.s3.amazonaws.com/press/logo/icon-512x512.png\"/>";
	echo "</div>";
	echo "<div class=\"postText\">";
	echo "<h1>".$name."</h1>";
	echo "<p>".$venues['response']['groups'][0]['items']['address']."</p>";
	echo "</div></div>";
}
*/
//End Call Twitter
// curl_close($four);
// curl_close($ch1);
// curl_close($lat);
// curl_close($lon);
?>