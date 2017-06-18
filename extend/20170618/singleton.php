<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Singleton</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Using a Singleton Config Object</h2>
<?php
require('Config.php');

$CONFIG = Config::getInstance();

$CONFIG->set('live', 'true');

echo '<p>$CONFIG["live"]: ' . $CONFIG->get('live') . '</p>';

$TEST = Config::getInstance();
echo '<p>$TEST["live"]: ' . $TEST->get('live') . '</p>';

unset($CONFIG, $TEST);

?>
</body>
</html>