<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * Class Person
 */
class Person
{
    protected $name;
    public $sex;

    function __construct($name, $sex)
    {     //声明构造函数
        $this->name = $name;
        $this->sex = $sex;
    }

    function say()
    {
        echo "我叫{$this->name}，我是{$this->sex}生！<br>";
    }
}

/**
 * Class Student
 */
class Student extends Person
{                       //子类继承父类
    public $school;

    function __construct($name, $sex, $school)
    {          //子类的构造函数
        parent::__construct($name, $sex);        //调用父类构造进行复制
        $this->school = $school;
    }

    function program()
    {
        echo "PHP真好玩！我爱PHP！PHP是世界上最好用的编程语言！<br>";
    }

    function say()
    {
        parent::say();                      //重写父类的同名方法
        echo "我是{$this->school}的";
    }
}

$zhangsan = new Student("张三", "男", "起航");
$zhangsan->say();
$zhangsan->program();

/**
 * Class PersonOne
 * @param {String} $name
 * @param {String} $age
 * @param {String} $sex
 */
class PersonOne
{
    public $name;
    public $age;
    public $sex;

    function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->setAge($age);
        $this->setSex($sex);
    }

    function setAge($age)
    {
        if ($age >= 0 && $age <= 120) {
            return $this->age = $age;
        } else {
            die("年龄输入有误！！！");
        }
    }

    function setSex($sex)
    {
        if ($sex == "女" || $sex == "男") {
            return $this->sex = $sex;
        } else {
            die("性别输入有误！！！");
        }
    }

    function say()
    {
        echo "我的名字叫{$this->name},我的年龄{$this->age},我的性别是{$this->sex}<br>";
    }
}

/**
 * Class Work
 */
class Work extends Person
{
    private $position;

    function __construct($name, $age, $sex, $position, $job)
    {
        parent::__construct($name, $age, $sex);
        $this->job = $job;
        $this->setPosition($position);
    }

    function setPosition($position)
    {
        $arr = ['总监', '董事长', '程序员', '清洁工'];
        if (in_array($position, $arr)) {
            return $this->position = $position;
        } else {
            die("不存在该职位");
        }
    }

    function __set($key, $value)
    {
        if ($key == "age") {
            return parent::setAge($value);
        } elseif ($key == "sex") {
            return parent::setSex($value);
        } elseif ($key == "position") {
            return $this->setPosition($value);
        }
        return $this->$key = $value;
    }

    function say()
    {
        parent::say();
        echo "我的职位是{$this->position}";
    }
}

$zhangsan = new Work("张三", 22, "男", "总监");
$zhangsan->setSex("女");
$zhangsan->setAge(30);
//  $zhangsan->setPosition("董事长");
$zhangsan->position = "董事长";
//$zhangsan->name = "lisi";
$zhangsan->say();

/**
 * Interface InkBox
 */
interface InkBox
{
    function color();
}

/**
 * Interface Paper
 */
interface Paper
{
    function sizes();
}

/**
 * Class Computer
 */
class Computer
{
    function fangfa(InkBox $a, Paper $b)
    {     //父类引用
        echo "即将开始打印····<br>";
        $a->color();
        $b->sizes();
        echo "打印结束···<br>";

    }
}

/**
 * Class Color
 */
class Color implements InkBox
{
    function color()
    {
        echo "正在装载彩色墨盒<br>";
        echo "实现彩色墨盒<br>";
    }
}

/**
 * Class White
 */
class White implements InkBox
{
    function color()
    {
        echo "正在装载黑白墨盒<br>";
        echo "实现黑白墨盒<br>";
    }
}

/**
 * Class A4
 */
class A4 implements Paper
{
    function sizes()
    {
        echo "正在加载A4纸张<br>";
        echo "实现A4纸张<br>";
    }
}

/**
 * Class A5
 */
class A5 implements Paper
{
    function sizes()
    {
        echo "实现A5纸张<br>";
    }
}

$com = new Computer();//创建对象
$com->fangfa(new Color(), new A4());//子类对象