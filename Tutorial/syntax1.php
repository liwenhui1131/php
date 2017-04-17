<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$a = 12;
$b = 13;
if ($a == 12 xor $b == 13) {
    echo "两个条件为真<br>";
}
if ($a == 12 xor $b == 14) {
    echo "两个条件有一个为真<br>";
}

$c = "abc";
$d = "efg";
$f = $c . $d;
echo "f的值为:$f<br>";
$c .= $d;
echo "c的值为:$c<br>";

$abc = 12;
if ($abc < 0) {
    echo "abc的值小于0<br>";
} elseif ($abc < 10) {
    echo "abc的值大于0且小于10<br>";
} else {
    echo "abc的值大于10<br>";
}

switch ($abc) {
    case 10:
        echo "abc的值为10<br>";
        break;
    case 11:
        echo "abc的值为11<br>";
        break;
    case 12:
        echo "abc的值为12<br>";
        break;
    default:
        break;
}
?>
</body>
</html>