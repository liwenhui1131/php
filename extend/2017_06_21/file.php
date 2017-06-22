<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * PHP 非递归实现查询该目录下所有文件
 * @param unknown $dir
 * @return multitype:|multitype:string
 */
function scanfiles($dir)
{
    if (!is_dir($dir)) {
        return array();
    }

    // 兼容各操作系统
    $dir = rtrim(str_replace('\\', '/', $dir), '/') . '/';

    // 栈，默认值为传入的目录
    $dirs = array($dir);

    // 放置所有文件的容器
    $rt = array();

    do {
        // 弹栈
        $dir = array_pop($dirs);

        // 扫描该目录
        $tmp = scandir($dir);

        foreach ($tmp as $f) {
            // 过滤. ..
            if ($f == '.' || $f == '..') {
                continue;
            }

            // 组合当前绝对路径
            $path = $dir . $f;


            // 如果是目录，压栈。
            if (is_dir($path)) {
                array_push($dirs, $path . '/');
            } else {
                if (is_file($path)) { // 如果是文件，放入容器中
                    $rt [] = $path;
                }
            }
        }

    } while ($dirs); // 直到栈中没有目录

    return $rt;
}

/**
 * 遍历某个目录下的所有文件
 * @param string $dir
 */
function scanAll($dir)
{
    $list = array();
    $list[] = $dir;

    while (count($list) > 0) {
        //弹出数组最后一个元素
        $file = array_pop($list);

        //处理当前文件
        echo $file . "\r\n";

        //如果是目录
        if (is_dir($file)) {
            $children = scandir($file);
            foreach ($children as $child) {
                if ($child !== '.' && $child !== '..') {
                    $list[] = $file . '/' . $child;
                }
            }
        }
    }
}

/**
 * 遍历某个目录下的所有文件(递归实现)
 * @param string $dir
 */
function scanAll2($dir)
{
    echo $dir . "\r\n";

    if (is_dir($dir)) {
        $children = scandir($dir);
        foreach ($children as $child) {
            if ($child !== '.' && $child !== '..') {
                scanAll2($dir . '/' . $child);
            }
        }
    }
}