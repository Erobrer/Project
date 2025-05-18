<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$url = "https://api.deezer.com/chart/0/tracks";
$data = file_get_contents($url);
echo $data;
?>
