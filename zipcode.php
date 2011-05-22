<?php
//Get lat long from zipcode. GET variables.
$doc = new DOMDocument();
	$zip = $_GET["zip"];
	if(isset($_POST["zip"]))
		$zip=$_POST["zip"];
	$doc->load('http://ws.geonames.org/postalCodeSearch?postalcode='.$zip.'&country=US');
  	$arrFeeds = array();
  	foreach ($doc->getElementsByTagName('code') as $node) {
    $itemRSS = array ( 
      'lat' => $node->getElementsByTagName('lat')->item(0)->nodeValue,
      'lng' => $node->getElementsByTagName('lng')->item(0)->nodeValue,
      );
    array_push($arrFeeds, $itemRSS);
  }
  if($_GET["lat"]==1 || $_POST["lat"==1])
	  echo $arrFeeds[0]['lat'];
  if($_GET["lng"]==1 || $_POST["lng"==1])	
  	echo $arrFeeds[0]['lng'];
?>