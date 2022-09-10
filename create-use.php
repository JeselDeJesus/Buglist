<?php
$client = new Client();
$headers = [
  'Authorization' => 'q3wRTk7_I7_Qktgp1J27tUxZ-mEDe3ld',
  'Content-Type' => 'application/json'
];
$body = '{
  "username": "Kozey",
  "password": "sheeshcake1331",
  "real_name": "Jesel De Jesus",
  "email": "dejesus.jeselaurvic@auf.edu.ph",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', MANTISHUB_URL. '/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();