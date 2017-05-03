<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filters Advanced</title>
</head>
<body>
<?php
$int = 122;
$min = 1;
$max = 200;

if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
    echo "Variable value is not within the legal range" . "<br>";
} else {
    echo "Variable value is within the legal range" . "<br>";
}

$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
    echo "$ip is a valid IPv6 address" . "<br>";
} else {
    echo "$ip is not a valid IPv6 address" . "<br>";
}

$url = "https://www.w3schools.com";

if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
    echo "$url is a valid URL" . "<br>";
} else {
    echo "$url is not a valid URL" . "<br>";
}

$str = "<h1>Hello WorldÆØÅ!</h1>";

$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $newstr;
?>
</body>
</html>