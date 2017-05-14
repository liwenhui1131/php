<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Basic Syntax</title>
</head>
<body>
<?
$i = '只会看到一次';
echo "$i<br>";
echo '$i';

$y = "界定符";
echo <<<std
这与双引号没什么区别，\$i同样可以显示出<br>
\$i的值为： $i
std;

echo pi() . "<br>";

$string1 = 'str';
unset($string1);
if (is_null($string1)) {
    echo 'string1=null<br>';
}

$string2 = false;
echo (integer)$string2 . '<br>';
echo settype($string2, 'integer') . '<br>';

echo is_bool(true) . '<br>';
echo is_integer(3) . '<br>';
echo is_integer('3') . '<br>';
echo is_numeric('314') . '<br>';

echo "当前文件路径：" . __FILE__ . '<br>';
echo "当前行数：" . __LINE__ . '<br>';
echo "当前PHP版本信息：", PHP_VERSION . '<br>';
echo "当前操作系统：" . PHP_OS . '<br>';

$change_name = 'trans';
$trans = "可变变量";
echo $change_name . '<br>';
echo $$change_name . '<br>';

$value = "qqq";
echo ($value == true) ? 三元运算符 : 没有改值 . '<br>';

/**
 * 定义按引用传递方式的函数
 * @param $m
 */
function example(&$m)
{
    $m == $m * 5 + 10;
    echo "在函数内：\$m=" . $m . '<br>';
}

$m = 1;
example($m);
echo "在函数外：\$m=" . $m . '<br>';

/**
 * 对函数的引用，即对函数返回结果的引用
 * @param $tmp
 * @return $tmp
 */
function &example1($tmp = 0)
{
    return $tmp + 2;
}

$str = &example1("3");
echo $str . '<br>';

?>
</body>
</html>