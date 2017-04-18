<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$cars = array('Volvo', 'BMW', 'Toyota');
echo "I like " . $cars[0] . "," . $cars[1] . " and " . $cars[2] . ".<br>";

$arrayLength = count($cars);
for ($i = 0; $i < $arrayLength; $i++) {
    echo $cars[$i] . '<br>';
}

foreach ($cars as $value) {
    echo $value . '<br>';
}

$age = array('lisi' => 25, 'zhangsan' => 34, 'wangwu' => 33);
echo 'lisi is ' . $age[lisi] . ' year old<br>';

foreach ($age as $x => $x_value) {
    echo $x . ' is ' . $x_value . ' year old<br>';
}

sort($cars);
foreach ($cars as $value) {
    echo $value . "<br>";
}

rsort($cars);
foreach ($cars as $value) {
    echo $value . '<br>';
}

asort($age);
foreach ($age as $x => $x_value) {
    echo $x_value . '<br>';
}

arsort($age);
foreach ($age as $x => $x_value) {
    echo $x_value . '<br>';
}

ksort($age);
foreach ($age as $x => $x_value) {
    echo $x . '<br>';
}

krsort($age);
foreach ($age as $x => $x_value) {
    echo $x . '<br>';
}
?>
</body>
</html>