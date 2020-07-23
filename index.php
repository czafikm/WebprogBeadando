<?php 
// PHP code to extract IP  
function getVisIpAddr() { 
      
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
        return $_SERVER['HTTP_CLIENT_IP']; 
    } 
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        return $_SERVER['HTTP_X_FORWARDED_FOR']; 
    } 
    else { 
        return $_SERVER['REMOTE_ADDR']; 
    } 
} 
// PHP code to obtain country, city,  
// continent, etc using IP Address 
  
$ip = getVisIpAddr(); 
  
// Use JSON encoded string and converts 
// it into a PHP variable 
$ipdat = @json_decode(file_get_contents( 
    "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
$country;
if ($ipdat!=null) {
	$country=$ipdat->geoplugin_countryCode;
}
else $country="HU";
if(!isset($_COOKIE['language'])) {
	$cookie_name = "language";
	switch ($country) {
		case 'HU':
			$country="HU";
			echo '<script>window.location.href="/yasuo/hu/index.php";;</script>';
			break;
		case 'EN':
			$country="EN";
			echo '<script>window.location.href="/yasuo/en/index.php";</script>';
			break;
		case 'US':
			$country="EN";
			echo '<script>window.location.href="/yasuo/en/index.php";</script>';
			break;
		default:
			$country="HU";
			echo '<script>window.location.href="/yasuo/hu/index.php";;</script>';
			break;
	}
	$cookie_value = $country;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
  	$_COOKIE['language']=$country;
}
else{
		switch ($_COOKIE['language']) {
		case 'HU':
			echo '<script>window.location.href="/yasuo/hu/index.php";</script>';
			break;
		case 'EN':
			echo '<script>window.location.href="/yasuo/en/index.php";</script>';
			break;
		case 'US':
			echo '<script>window.location.href="/yasuo/en/index.php";</script>';
			break;
		default:
			echo '<script>window.location.href="/yasuo/hu/index.php";</script>';
			break;
	}
}

?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Yasuo nevelde</title>
</head>
<body>

</body>
</html>