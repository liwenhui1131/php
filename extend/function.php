<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP function</title>
</head>
<body>
<?
/**
 * PHP加密解密
 * @param $key
 * @param $string
 * @param $decrypt
 * @return $encrypted
 */
function encryptDecrypt($key, $string, $decrypt)
{
    if ($decrypt) {
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "12");
        return $decrypted;
    } else {
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }
}

echo encryptDecrypt('password', 'Helloweba欢迎您', 0);
echo encryptDecrypt('password', 'z0JAx4qMwcF+db5TNbp/xwdUM84snRsXvvpXuaCa4Bk=', 1);

/**
 * PHP生成随机字符串
 * @param $length
 * @return $randomString
 */
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$filename = '我的文档.doc';
echo getExtension($filename);

/**
 * PHP获取文件大小并格式化
 * @param $size
 * @return $result
 */
function formatSize($size)
{
    $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
    if ($size == 0) {
        return ('n/a');
    } else {
        return $result = (round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
    }
}

$thefile = filesize('test_file.mp3');
echo formatSize($thefile);

/**
 * PHP替换标签字符
 * @param $string
 * @param $replacer
 * @return $result
 */
function stringParser($string, $replacer)
{
    $result = str_replace(array_keys($replacer), array_values($replacer), $string);
    return $result;
}

$string = 'The {b}anchor text{/b} is the {b}actual word{/b} or words used {br}to describe the link {br}itself';
$replace_array = array('{b}' => '<b>', '{/b}' => '</b>', '{br}' => '<br />');

echo stringParser($string, $replace_array);

/**
 * PHP列出目录下的文件名
 * @param $DirPath
 */
function listDirFiles($DirPath)
{
    if ($dir = opendir($DirPath)) {
        while (($file = readdir($dir)) !== false) {
            if (!is_dir($DirPath . $file)) {
                echo "filename: $file<br />";
            }
        }
    }
}

listDirFiles('home/some_folder/');
?>

</body>
</html>