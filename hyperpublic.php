<?php
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://api.hyperpublic.com/api/v1/places?client_id=eHsymoJvDKv7cmF4C3LvTUz4uv0AK8ZzGA7kQya8&client_secret=Y3bDUTvnF5jxScoe8HxOTm54mVY8Iad0NgUHSQ4w&postal_code=94104&radius=15&with_photo=true&limit=45");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$res = curl_exec($ch);

//echo $res;
// close cURL resource, and free up system resources

$decoded = json_decode($res, true);


for($i=0; $i<count($decoded);$i++){
	echo "<div class=\"singlePhoto\">";
	echo "<a href=\"".$decoded[$i]['perma_link']."\">";
	echo "<img src="."\"".$decoded[$i]['images'][0]['src_small']."\"/></a>";
	echo "</div>";
}
curl_close($ch);
?>