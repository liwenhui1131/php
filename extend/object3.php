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
    <title>PHP Object</title>
</head>
<body>
<?php

/**
 * example类
 */
class example
{
    function exam()
    {
        if (isset($this)) {
            echo '$this的值为：' . get_class($this);
        } else {
            echo '$this的值为：';
        }
    }
}

$class_name = new example();
$class_name->exam();

/**
 * Book类
 */
class Book
{
    const NAME = 'computer';

    function __construct()
    {
        echo '本月图书类冠军为' . Book::NAME . ' ';
    }
}

/**
 * Book类的子类
 */
class l_book extends Book
{
    const NAME = 'foreign language';

    function __construct()
    {
        parent::__construct();
        echo '本月图书类冠军为' . self::NAME . ' ';
    }
}

$obj = new l_book();

/**
 * Book2类
 */
class Book2
{
    private $name = 'computer';

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

/**
 * Book2类的子类
 */
class LBook extends Book
{
}

$lbook = new LBook();
echo '正常操作私有变量的方法';
$lbook->setName("PHP从入门到开发应用ͨ");
echo $lbook->getName();
echo '<br>ֱ直接操作私有变量的结果';
echo Book::$name;


/**
 * Book3类
 */
class Book3
{
    protected $name = 'computer';
}

/**
 * Book3类的子类
 */
class LBook3 extends Book
{
    public function showMe()
    {
        echo '对于protected修饰的变量，在子类中是可以直接调用的，如：$name = ' . $this->name;
    }
}

$lbook = new LBook();
$lbook->showMe();
echo '<p>但在其他的地方是不可以调用的，否则：';
$lbook->name = 'history';


/**
 * Book4类
 */
class Book4
{
    static $num = 0;

    public function showMe()
    {
        echo '���ǵ�' . self::$num . 'λ�ÿ�';
        self::$num++;
    }
}

$book1 = new Book();
$book1->showMe();
echo "<br>";
$book2 = new Book();
$book2->showMe();
echo "<br>";
echo '您是第' . Book::$num . '位的访客';
?>
</body>
</html>