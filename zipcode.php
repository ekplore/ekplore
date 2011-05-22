<?php
/**
* Initialize the cURL session
*/
$ch = curl_init();
/**
* Set the URL of the page or file to download.
*/
$link = 'http://ws.geonames.org/postalCodeSearch?postalcode=94104&country=US';
curl_setopt($ch, CURLOPT_URL,$link);
/**
* Create a new file
*/
$fp = fopen('zip.xml', 'w');
/**
* Ask cURL to write the contents to a file
*/
curl_setopt($ch, CURLOPT_FILE, $fp);
/**
* Execute the cURL session
*/
curl_exec ($ch);
/**
* Close cURL session and file
*/
curl_close ($ch);
fclose($fp);


// curl_setopt($ch, CURLOPT_URL, $link);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// 
// curl_close($ch);

$xmlUrl = "zip.xml"; // XML feed file/URL
$xmlStr = file_get_contents($xmlUrl);
$xmlObj = simplexml_load_string($xmlStr);
$arrXml = objectsIntoArray($xmlObj);
print_r($arrXml);
?>