<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Date and Time</title>
</head>
<body>
<?php
echo "今天是 " . Date("Y/m/d") . "<br>";
echo "今天是 " . Date("Y.m.d") . "<br>";
echo "今天是 " . Date("Y-m-d") . "<br>";
echo "今天是 " . date("l");

echo "当前时间是 " . date("h:i:sa");

date_default_timezone_set("Asia/Shanghai");
echo "当前时间是 " . date("h:i:sa");

$d = mktime(9, 12, 31, 6, 10, 2015);
echo "创建日期是 " . date("Y-m-d h:i:sa", $d);

$d = strtotime("10:38pm April 15 2015");
echo "创建日期 " . date("Y-m-d h:i:sa", $d);

$d = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
    echo date("M d", $startdate), "<br>";
    $startdate = strtotime("+1 week", $startdate);
}

$d1 = strtotime("December 31");
$d2 = ceil(($d1 - time()) / 60 / 60 / 24);
echo "距离十二月三十一日还有：" . $d2 . " 天。";
?>

</body>
</html>