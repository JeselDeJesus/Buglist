<?php
$client = new Client();
$headers = [
  'Authorization' => 'q3wRTk7_I7_Qktgp1J27tUxZ-mEDe3ld',
  'Content-Type' => 'application/json'
];
$body = '{
  "text": "dejesus.jeselaurvic@auf.edu.ph",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', MANTISHUB_URL. '/api/rest/issues/[ISSUE_NUMBER]/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();