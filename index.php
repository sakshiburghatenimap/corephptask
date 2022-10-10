<?php

$ch = curl_init();

curl_setopt($ch , CURLOPT_URL , "http://localhost/corephp/fetchdata");

curl_exec($ch);

curl_close($ch);

?>