<?php

/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * 保存对象的变量被提前unset,调用析构方法
 * Class Student
 */
class Student
{
    public $stu_name;
    public $stu_age;

    public function sayName()
    {
        return $this->stu_name;
    }

    public function __destruct()
    {
        echo 'i am destructed<br/>';
    }
}

$stu = new Student;
var_dump($stu);
unset($stu);
var_dump($stu);
echo 'Script end!<br/>';

/**
 * 赋予变量新值，触发析构方法
 * Class StudentA
 */
class StudentA
{
    public $stu_name;
    public $stu_age;

    public function sayName()
    {
        return $this->stu_name;
    }

    public function __destruct()
    {
        echo 'i am destructed<br/>';
    }
}

$stu = new StudentA;
$stu = new StudentA;

/**
 * 静态成员
 * Class StudentB
 */
class StudentB
{
    private static $count;

    public function __construct()
    {
        echo self::$count++;
    }

    public function __destruct()
    {
        echo self::$count--;
    }
}

$s1 = new StudentB;
$s2 = new StudentB;
unset($s2);
$s3 = new Student;

/**
 * Class Amparent
 */
class Amparent
{
    public function thisWho()
    {
        var_dump($this);
    }
}

/**
 * Class Amchild
 */
class Amchild extends Amparent
{
    protected $myname = '小王';
}

$amchild = new  Amchild;
$amchild->thisWho();
