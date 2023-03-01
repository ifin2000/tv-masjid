<?php
date_default_timezone_set('Asia/Jakarta');
$thn = date('Y');
$bln = date('m');
$tgl = date('d');
// GET FROM API
$url = 'https://api.myquran.com/v1/sholat/jadwal/1204/'.$thn.'/'.$bln.'/'.$tgl;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);
$shubuh = $response['data']['jadwal']['subuh'];
$terbit = $response['data']['jadwal']['terbit'];
$dhuhur = $response['data']['jadwal']['dzuhur'];
$ashar = $response['data']['jadwal']['ashar'];
$maghrib = $response['data']['jadwal']['maghrib'];
$isya = $response['data']['jadwal']['isya'];
// keluarkan sbg string
echo $shubuh.'#'.$terbit.'#'.$dhuhur.'#'.$ashar.'#'.$maghrib.'#'.$isya;
?>