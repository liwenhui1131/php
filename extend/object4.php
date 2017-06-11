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
 * SportObject类
 */
class SportObject
{
    private $type = ' ';

    public function getType()
    {
        return $this->type;
    }

    private function __get($name)
    {
        if (isset($this->$name)) {
            echo '变量' . $name . '的值为' . $this->$name . '<br>';
        } else {
            echo '变量' . $name . '未定义，初始化为0<br>';
            $this->$name = 0;
        }
    }

    private function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
            echo '变量' . $name . '赋值为' . $value . '<br>';
        } else {
            $this->$name = $value;
            echo '变量' . $name . '被赋值为' . $value . '<br>';
        }
    }
}

$MyComputer = new SportObject();
$MyComputer->type = 'DIY';
$MyComputer->type;
$MyComputer->name;


/**
 * SportObject类
 */
class SportObject1
{
    public function myDream()
    {
        echo '调用的方法存在，直接执行<p>';
    }

    public function __call($method, $parameter)
    {
        echo '如果方法不存在，这执行_call方法';
        echo '方法名为' . $method . '<br>';
        echo '参数有';
        var_dump($parameter);
    }
}

$MyLife = new SportObject();
$MyLife->myDream();
$MyLife->mDream('how', 'what', 'why');
?>
</body>
</html>