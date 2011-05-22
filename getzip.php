<?php
//url http://api.ipinfodb.com/v3/ip-city/?key=e600ee59991826032493af04a14c04f52492c4be4a42a358ab1bf5d7b55d5a9f&ip=$ipAddress&format=json

$ip = gethostbyname($_SERVER['REMOTE_ADDR']);
function get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }
}
$ipAddress=get_ip_address();

//echo $ipAddress."<br/>";
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://api.ipinfodb.com/v3/ip-city/?key=e600ee59991826032493af04a14c04f52492c4be4a42a358ab1bf5d7b55d5a9f&ip=$ipAddress&format=json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// grab URL and pass it to the browser
$res = curl_exec($ch);

//echo $res;
// close cURL resource, and free up system resources

$decoded = json_decode($res, true);
echo $decoded['zipCode'];
?>