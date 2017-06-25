<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * 开始会话
 */
session_start();

$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.<br>";

echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";

print_r($_SESSION);
echo "<br>";

$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);

/**
 * 清空销毁会话
 */
session_unset();
session_destroy();
