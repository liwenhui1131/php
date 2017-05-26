<?
/*
 * 一些自定义的方法
 * @author 李文辉
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Function</title>
</head>
<body>
<?php
/*
 * 把一些预定义的字符转换为 HTML 实体
 * @param string $string
 * @return string $string
 */
function d_htmlspecialchars($string)
{
    if (is_array($string)) {
        foreach ($string as $key => $val) {
            $string[$key] = d_htmlspecialchars($val);
        }
    } else {
        $string = str_replace('&', '&', $string);
        $string = str_replace('"', '"', $string);
        $string = str_replace('\'', '\'', $string);
        $string = str_replace('<', '<', $string);
        $string = str_replace('>', '>', $string);
        $string = preg_replace('/&(#\d;)/', '&\1', $string);
    }
    return $string;
}

/*
 * 在预定义字符前加上反斜杠，包括 单引号、双引号、反斜杠、NULL，以保护数据库安全
 * @param string $string
 *  @param number $force
 * @return string $string
 */
function d_addslashes($string, $force = 0)
{
    if (!$GLOBALS['magic_quotes_gpc'] || $force) {
        if (is_array($string)) {
            foreach ($string as $key => $val) $string[$key] = d_addslashes($val, $force);
        } else $string = addslashes($string);
    }
    return $string;
}

/*
 * 生成随机字符串，包含大写、小写字母、数字
 *  @param number $length
 * @return $hash
 */
function randstr($length)
{
    $hash = '';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double)microtime() * 1000000);
    for ($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}

/*
 * 获取IP
 * @return string $ip
 */
function get_ip()
{
    if ($_SERVER["HTTP_X_FORWARDED_FOR"])
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    else if ($_SERVER["HTTP_CLIENT_IP"])
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    else if ($_SERVER["REMOTE_ADDR"])
        $ip = $_SERVER["REMOTE_ADDR"];
    else if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else
        $ip = "Unknown";
    return $ip;
}

/*
 * 获取当前页面的URL地址
 * @return string $return_url
 */
function url_this()
{
    $url = "http://" . $_SERVER ["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $return_url = "<a href='$url'>$url</a>";
    return $return_url;
}

?>
</body>
</html>