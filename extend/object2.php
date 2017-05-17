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
 * @return object_name
 */
class SportObject
{
    const BOOK_TYPE = '计算机图书';
    public $object_name;

    function setObjectName($name)
    {
        $this->object_name = $name;
    }

    function getObjectName()
    {
        return $this->object_name;
    }
}

$c_book = new SportObject();
$c_book->setObjectName("PHP类");
echo SportObject::BOOK_TYPE . "->";
echo $c_book->getObjectName();
?>
</body>
</html>
