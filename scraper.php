<?php 

$city=$_GET['city']; 

$city = str_replace("", "", $city); //remove blank spaces from city user input 

$url = "http://www.weather-forecast.com/locations/".$city."/forecasts/latest";

function get_http_response_code($url) { 
	$headers = get_headers($url); 

	return substr($headers[0], 9, 3); 
	}

if(get_http_response_code($url) != "404"){ 
	$contents = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");

	preg_match('/3 Day Weather Forecast Summary:<\/b>(.*?)<\/span>/s', $contents, $matches); //(.*?) match everything in between, /s for multiline check 

	echo $matches[1]; 

	} else { 

		echo "error"; 
		$matches[1] = ""; 
		echo $matches[1]; 
	} 

?>