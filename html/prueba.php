<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://3.210.38.58/wp-json/wcmp/v1/vendors?oauth_consumer_key=ck_54c44de2aeeef51ed8070303308be28e293cabea&oauth_token=&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1600382697&oauth_nonce=uJRwgFWkU23&oauth_version=1.0&oauth_callback=http://3.83.230.246/comercios.php&oauth_signature=q/eMqwMQTENsWJUpkr5esP6dqSY=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo 'response ' . $response;

  $a = parse_str($response);

  echo 'token ' . $oauth_token;
  echo '<br>';
  echo 'secret '. $oauth_token_secret;


}
echo $response;
