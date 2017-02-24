<?php

$titel = $_POST['Title'];
$Year = $_POST['Year'];
$search_host = '192.168.2.11';
$search_port = '9200';
$index = 'movies';
$doc_type = 'soort';
$doc_id = rand();
$json_doc = array(
                "title" => $titel,
                "extra" => "Nieuw",
                "director" => "Zoek",
                "year" => $Year
            );
$json_doc = json_encode($json_doc);
$baseUri = 'http://'.$search_host.':'.$search_port.'/'.$index.'/'.$doc_type.'/'.$doc_id;
$ci = curl_init();
curl_setopt($ci, CURLOPT_URL, $baseUri);
curl_setopt($ci, CURLOPT_PORT, $search_port);
curl_setopt($ci, CURLOPT_TIMEOUT, 200);
curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ci, CURLOPT_FORBID_REUSE, 0);
curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ci, CURLOPT_POSTFIELDS, $json_doc);
$response = curl_exec($ci);
echo ' response = ', $response;
?>	
<br><a href ="http://192.168.2.11:9200/movies/soort/_search?q=director:%22Zoek%22?fields=title,year">Resultaten zijn nu dus</a>
<br><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back</a>
<br><a href="http://www.van-maanen.com">Home</a>
