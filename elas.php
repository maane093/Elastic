<?php


$sub_req_url = "http://192.168.2.11:9200/";

$ch = curl_init($sub_req_url);
$encoded = '';

// include GET as well as POST variables; your needs may vary.
/*foreach($_GET as $name => $value) {
  $encoded .= urlencode($name).'='.urlencode($value).'&';
}

foreach($_POST as $name => $value) {
  $encoded .= urlencode($name).'='.urlencode($value).'&';
}

$encoded = substr($encoded, 0, strlen($encoded)-1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
*/

$result = curl_exec ($ch);
echo ' result = ', $result,' 1 = true'; 
if($result === FALSE) {
    die(curl_error($ch));
};

curl_close($ch);?>
<br><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a><br>