<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$a = 'hello word';
echo "php want to say $a<br>";
echo "php say" . $a . "<br>";
echo "<h2>variables</h2>";
$b = 1;
$d = 3;
$e = 4;
function showVariables()
{
    $c = 2;
    global $d;
    echo "local变量C的值为:$c<br>";
    echo "global变量b的值为:$b<br>";
    echo "global变量b的值为:$d<br>";
    echo "blobal变量b的值为:" . $GLOBALS['e'] . "<br>";
}

showVariables();
function staticVariable()
{
    static $f = 5;
    $f++;
    echo "static变量的值为：$f<br>";
}

staticVariable();
staticVariable();
staticVariable();
echo "<h2>data types</h2>";
var_dump($int = 1);
echo '<br/>';
var_dump($flo = 2.1);
echo '<br/>';
var_dump($str = 'hello word');
echo '<br/>';
var_dump($ff);
echo '<br/>';
var_dump($boo = true);
echo '<br/>';
var_dump($car = array("red", 'blue', 'black'));
echo '<br/>';

class car
{
    function car()
    {
        $this->model = 'VM';
    }
}

$herbie = new car();
echo $herbie->model . '<br>';
var_dump($herbie);
echo "<h2>strings</h2>";
$str = "hello word";
echo "字符串str的值为:" . $str . "<br>";
echo "str的字符串长度为:" . strlen($str) . "<br>";
echo "str的字数为:" . str_word_count($str) . "<br>";
echo "reverse字符串str的结果为:" . strrev($str) . "<br>";
echo "字符串str中word字符的位置在:" . strpos($str, 'word') . "<br>";
echo "用liwenhui替换字符串str中的word:" . str_replace('word', 'liwenhui', $str) . "<br>";
echo "<h2>constants</h2>";
define("name", "liwenhui");
echo "常量name的值为：" . name . "<br>";
echo "常量name的值为：" . NAME . "<br>";
define("age", 233, true);
echo "常量age的值为：" . age . "<br>";
echo "常量age的值为：" . AGE . "<br>";
?>

</body>
</html>