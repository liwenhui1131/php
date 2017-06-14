<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * Class Woman
 */
class Woman
{
    public $name = "gaojin";
    protected $age = "22";
    private $height = "170";

    function info()
    {
        echo $this->name;
    }

    private function say()
    {
        echo "这是私有的方法";
    }
}

$w = new Woman();
echo $w->info();
echo $w->name;//公共属性可以访问
echo $w->age;// 受保护属性,报致命错误
echo $w->height;// 受保护属性,报致命错误
$w->say(); // 私有方法,访问出错

/**
 *Girl is the base class that provides the *property*and *behavior* features
 */

/**
 * Class Girl
 */
class Girl extends Woman
{
    // 可以重新定义父类的public和protected方法,但不能定义private的
    protected $name = "jingao"; // 可以从新定义

    function info()
    {
        echo $this->name;
        echo $this->age;
        echo $this->height;
    }

    function say()
    {
        parent::say();//私有方法 不能被继承  如果父类的的say方法是protected 这里就不会报错
        echo "我是女孩";
    }
}

$g = new Girl();
$g->say();//正常输出
echo $g->height;//私有属性访问不到 没输出结果
$g->info();//这是输出 gaojin22 $height是私有的属性没有被继承
$g->height = "12";//这里是重新定义 height属性 也赋值了
$g->info();//所以这里会输出来gaojin2212

/**
 * Class Person
 *
 */
class Person
{
    public $name;
    public $sex;
    public $age;

    function __construct($name, $sex, $age)
    {//这是一个构造函数,new 实例化对象的时候调用
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;
    }

    function __destruct() //这是一个析构函数,在对象销毁前调用
    {
        echo '再见' . $this->name . '<br>';
    }

    function say()
    {
        echo "我的名字叫：" . $this->name . " 性别：" . $this->sex . " 我的年龄是：" . $this->age . "<br>";
    }
}

$p1 = new Person('张三', '男', 20);
$p2 = new Person('李四', '女', 30);
$p3 = new Person('王五', '男', 40);
$p1->say();
$p2->say();
$p3->say();

