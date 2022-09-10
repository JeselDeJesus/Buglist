<?php
include "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


define('TOKEN', 'q3wRTk7_I7_Qktgp1J27tUxZ-mEDe3ld');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL. 'api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();


$bugs_list = json_decode($bugs);
foreach ($bugs_list->issues as $bug)
{
	echo '<li>' . $bug->id . ' ' .
$bug->summary . ' - ' .
$bug->severity->name . ' - ' .
$bug->status->name . "\n";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugs List</title>
</head>
<body>
    
<h2>IPT10 Bugs List</h2>
<h2 style="color:black"><u style="color:black">DEJESUS, JESEL AURVIC S.</h2></u>

<table>
  <tr>
    <th>ID</th>
    <th>Summary</th>
    <th>Severity</th>
    <th>Status</th>
  </tr>
  
<tbody>
    <?php
foreach ($bugs_list->issues as $bug):
    ?>
    <tr>
        <td><?=$bug->id;?></td>
        <td><?=$bug->summary;?></td>
        <td><?=$bug->severity->name;?></td>
        <td><?=$bug->status->name;?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</body>
</html>