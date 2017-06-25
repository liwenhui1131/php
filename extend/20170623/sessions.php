<!DOCTYPE html="">HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=??????">
</head>
<body>
请登录：
<form method="post" action="mylogin1.php">
    用户名:<input type="text"><br>
    口　令:<input type="password"><br>
    <input type="submit" value="登录">
</form>
</body>
</html>
<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

$name = $_POST['name'];
$pass = $_POST['pass'];
if (!$name || !$pass) {
    echo "用户名或密码为空，请<a href=/'login.html/'>重新登录</a>";
    die();
}
if (!($name == "laogong" && $pass == "123")) {
    echo "用户名或密码不正确，请<a href=/'login.html/'>重新登录</a>";
    die();
}
/**
 * 注册用户
 */
ob_start();
session_start();
$_SESSION['user'] = $name;
$psid = session_id();
$fp = fopen("e://tmp//phpsid.txt", "w+");
fwrite($fp, $psid);
fclose($fp);

/**
 * 身份验证成功，进行相关操作
 */
echo "已登录<br>";
echo "<a href=/'mylogin2.php/'>下一页</a>";
?>
mylogin2.php
<?php
$fp = fopen("e://tmp//phpsid.txt", "r");
$sid = fread($fp, 1024);
fclose($fp);
session_id($sid);
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] = "laogong") {
    echo "已登录!";
} else {
    //成功登录进行相关操作
    echo "未登录，无权访问";
    echo "请<a href=/'login.html/'>登录</a>后浏览";
    die();
}
?>