<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://3.210.38.58/wp-json/wcmp/v1/vendors?oauth_consumer_key=ck_54c44de2aeeef51ed8070303308be28e293cabea&oauth_signature_method=HMAC-SHA256&oauth_timestamp=1600382319&oauth_nonce=dqG2vnPLLdd&oauth_version=1.0&oauth_callback=http://3.83.230.246/comercios.php&oauth_signature=075fXtGVtSiKQbq394XDPiZZxnRAZtZwyC4KCcn8tF0=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
