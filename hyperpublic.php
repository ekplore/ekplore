<?php
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
curl_setopt($ch1, CURLOPT_URL, "http://beta.ekplore.com/getzip.php");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$zip = curl_exec($ch1);
//echo $zip . "<br />";
}

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://api.hyperpublic.com/api/v1/places?client_id=eHsymoJvDKv7cmF4C3LvTUz4uv0AK8ZzGA7kQya8&client_secret=Y3bDUTvnF5jxScoe8HxOTm54mVY8Iad0NgUHSQ4w&postal_code=".$zip."&radius=15&with_photo=true&limit=55");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$res = curl_exec($ch);

$decoded = json_decode($res, true);
$count = count($decoded);
if($count>1)
	for($i=0; $i<$count;$i++){
		echo "<div class=\"singlePhoto\">";
		echo "<a href=\"".$decoded[$i]['perma_link']."\">";
		echo "<img src="."\"".$decoded[$i]['images'][0]['src_small']."\"/></a>";
		echo "</div>";
	}
else
	echo "<div class=\"error\">Your Zipcode is boring! <br /> No Images :(</div>";
curl_close($ch);
curl_close($ch1);
?>