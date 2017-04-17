<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$x = 1;
while ($x <= 5) {
    echo "x的值为：$x<br>";
    $x++;
}

$y = 1;
do {
    echo "y的值为：$y<br>";
    $y++;
} while ($y <= 5);

$a = 6;
do {
    echo "a的值为：$a<br>";
    $a++;
} while ($a < 5);

for ($j = 0; $j < 10; $j++) {
    echo "$j,";
}

$colors = array("red", "blue", "green", "black", "yellow");
foreach ($colors as $value) {
    echo "$value<br>";
}

function writeMsg()
{
    echo "Hello word<br>";
}

writeMsg();

function familyName($fname)
{
    echo "$fname Refsnes.<br>";
}

familyName('Jani');
familyName('bor');
familyName('li');

function personalInformation($name, $age)
{
    echo "$name.的年龄为：$age<br>";
}

personalInformation("张三", 23);
personalInformation("李四", 35);

function setHeight($minHeight = 13)
{
    echo "The height is : $minHeight<br>";
}

setHeight(133);
setHeight();

function sum($x, $y)
{
    return $x + $y;
}

echo "5+6=" . sum(5, 6) . "<br>";
echo "1+2=" . sum(1, 2) . "<br>";
?>
</body>
</html>