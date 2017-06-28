<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * @param $n
 * @param $m
 * @return mixed
 */
function king($n, $m)
{
    $monkeys = range(1, $n);
    $i = 0;
    $k = $n;
    while (count($monkeys) > 1) {
        if (($i + 1) % $m == 0) {
            unset($monkeys[$i]);
        } else {
            array_push($monkeys, $monkeys[$i]);
            unset($monkeys[$i]);
        }
        $i++;
    }
    return current($monkeys);
}

$a = king(5, 2);
var_dump($a);

/**
 * 汉诺塔问题
 * @param $n
 * @param $x
 * @param $y
 * @param $z
 */
function hanoi($n, $x, $y, $z)
{
    if ($n == 1) {
        echo 'move disk 1 from ' . $x . ' to ' . $z . "\n";
    } else {
        hanoi($n - 1, $x, $z, $y);
        echo 'move disk ' . $n . ' from ' . $x . ' to ' . $z . "\n";
        hanoi($n - 1, $y, $x, $z);
    }
}

hanoi(3, 'A', 'B', 'C');

/**
 * 快速排序
 * @param $array
 * @return array
 */
function quick_sort($array)
{
    if (count($array) <= 1) return $array;
    $key = $array[0];
    $left_arr = array();
    $right_arr = array();
    for ($i = 1; $i < count($array); $i++) {

        if ($array[$i] <= $key)

            $left_arr[] = $array[$i];
        else
            $right_arr[] = $array[$i];
    }
    $left_arr = quick_sort($left_arr);
    $right_arr = quick_sort($right_arr);
    return array_merge($left_arr, array($key), $right_arr);
}

/**
 * 二维数组排序算法
 * @param $arr
 * @param $keys
 * @param int $order
 * @return array|bool
 */
function array_sort($arr, $keys, $order = 0)
{
    if (!is_array($arr)) {
        return false;
    }
    $keysvalue = array();
    foreach ($arr as $key => $val) {
        $keysvalue[$key] = $val[$keys];
    }
    if ($order == 0) {
        asort($keysvalue);
    } else {
        arsort($keysvalue);
    }
    reset($keysvalue);
    foreach ($keysvalue as $key => $vals) {
        $keysort[$key] = $key;
    }
    $new_array = array();
    foreach ($keysort as $key => $val) {
        $new_array[$key] = $arr[$val];
    }
    return $new_array;
}