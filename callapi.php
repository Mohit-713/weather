<?php
$apiKey = "105f6c86da831ac299ebbf8edce0724d";
if(isset($cities)&&$cities!='')
{
	$cityId = $cities;
	$googleApiUrl = "http://api.openweathermap.org/data/2.5/group?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

}/*
else
{
	$cityId = "1268865";
	$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
}*/
if(isset($_GET['id']))
{
	$cityId =$_GET['id'];
	$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
	
}

if(isset($googleApiUrl)){
$ch = curl_init();
//echo $googleApiUrl;

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$citydatajson = json_decode($response);
//$currentTime = time();

if(isset($citydatajson))
{
	$lat=$citydatajson->coord->lat;
	$lon=$citydatajson->coord->lon;
	$googleapiurlhandday="https://api.openweathermap.org/data/2.5/onecall?lat=".$lat ."&lon=".$lon."&units=metric&appid=".$apiKey;
}

$ch = curl_init();
//echo $googleApiUrl;

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleapiurlhandday);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$citydatajson_HourAndDay = json_decode($response);


}
?>