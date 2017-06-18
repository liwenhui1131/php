<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 * */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Factory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('ShapeFactory.php');
require('Shape.php');
require('Triangle.php');
require('Rectangle.php');

if (isset($_GET['shape'], $_GET['dimensions'])) {

    $obj = ShapeFactory::Create($_GET['shape'], $_GET['dimensions']);

    echo "<h2>Creating a {$_GET['shape']}...</h2>";

    echo '<p>The area is ' . $obj->getArea() . '</p>';

    echo '<p>The perimeter is ' . $obj->getPerimeter() . '</p>';

} else {
    echo '<p class="error">Please provide a shape type and size.</p>';
}

unset($obj);

?>
</body>
</html>