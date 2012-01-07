<?php
// API CALL http://search.twitter.com/search.json?geocode=40.82,-73.93,5mi

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
$twit = curl_init();
curl_setopt($twit, CURLOPT_URL, "http://search.twitter.com/search.json?geocode=".$lat.",".$lng.",1mi&page=1");
curl_setopt($twit, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($twit);

$tweets = json_decode($res, true);


for($i=0; $i<count($tweets);$i++){
	//<div class="tweetPhoto"><img src="images/avatar.png">
	$name = $tweets['results'][$i]['from_user'];
	echo "<div class=\"postbar\">";
	echo "<div class=\"tweetPhoto\">";
	echo "<a href=\"http://www.twitter.com/$name\"><img src="."\"".$tweets['results'][$i]['profile_image_url']."\"/></a>";
	echo "</div>";
	echo "<div class=\"tweetText\">";
	echo "<h1><a href=\"http://www.twitter.com/$name\">@".$name."</a></h1>";
	echo "<p>".$tweets['results'][$i]['text']."</p>";
	echo "</div></div>";
}

// //End Call Twitter
// curl_close($twit);
// curl_close($ch1);
// curl_close($lat);
// curl_close($lon);
?>