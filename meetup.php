<?php
// http://api.meetup.com/2/open_events?status=upcoming&radius=25.0&desc=True&offset=0&format=json&zip=10034&page=10&key=74505d205b03c47486a2a79141536

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


//Meetup stuff here.
$meet = curl_init();
curl_setopt($meet, CURLOPT_URL, "http://api.meetup.com/2/open_events?status=upcoming&radius=25.0&desc=true&offset=0&format=json&zip=".$zip."&page=6&key=74505d205b03c47486a2a79141536");
curl_setopt($meet, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($meet);

$meetup = json_decode($res, true);


for($i=0; $i<count($meetup['results']);$i++){
	
	$name = $meetup['results'][$i]['name'];
	$link = $meetup['results'][$i]['event_url'];
	$photo = $meetup['results'][$i]['photo_url'];
	if(!isset($photo))
		$photo=$site_url."images/meetup_logo.gif";
	echo "<div class=\"postBar\">";
	echo "<div class=\"postPhoto\">";
	echo "<a href=".$link."><img src=\"".$photo."\"/></a>";
	echo "</div>";
	echo "<div class=\"postText\">";
	echo "<h1><a href=".$link.">".$name."</a></h1>";
	if($meetup['results'][$i]['venue']['city']!=null)
		echo "<p>".$meetup['results'][$i]['venue']['address_1'].",".$meetup['results'][$i]['venue']['city'].",".$meetup['results'][$i]['venue']['state']."</p>";
	else
		echo "<p>".$meetup['results'][$i]['group']['urlname']."</p>";
	echo "</div></div>";
}


//Close Curl Connections
// curl_close($meet);
// curl_close($ch1);
?>