<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/5/16
 */
?>
<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Object</title>
</head>
<body>
<?php

/**
 * SportObject类
 * @param name
 * @param height
 * @param avoirdupois
 */
class SportObject
{
    function beatBasketball($name, $height, $avoirdupois)
    {
        if ($height > 180 and $avoirdupois <= 100) {
            return $name . "符合打篮球的要求";
        } else {
            return $name . "不符合打篮球的要求";
        }
    }
}

$sport = new SportObject();
echo $sport->beatBasketball('明日', '185', '80', '20岁', '男');

/**
 * SportObject1类
 * @param name
 * @param height
 * @param avoirdupois
 */
class SportObject1
{
    public $name;
    public $height;
    public $avoirdupois;

    public function bootFootBall($name, $height, $avoirdupois)
    {
        $this->name = $name;
        $this->height = $height;
        $this->avoirdupois = $avoirdupois;
        if ($this->height < 185 and $this->avoirdupois < 85) {
            return $this->name . "符合踢足球的要求";
        } else {
            return $this->name . "不符合踢足球的要求";
        }
    }
}

$sport = new SportObject1();
echo $sport->bootFootBall('明日', '185', '80');
?>
</body>
</html>
