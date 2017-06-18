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
    <title>Composite</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Using Composite</h2>
<?php

/**
*Load the class definition:
 */
require('WorkUnit.php');

/**
 * Create the objects:
 */
$alpha = new Team('Alpha');
$john = new Employee('John');
$cynthia = new Employee('Cynthia');
$rashid = new Employee('Rashid');


$alpha->add($john);// Assign employees to the team:
$alpha->add($rashid);

/**
 *Assign tasks:
 */
$alpha->assignTask('Do something great.');
$cynthia->assignTask('Do something grand.');

/**
 *Complete a task:
 */
$alpha->completeTask('Do something great.');

$alpha->remove($john);// Remove a team member:

unset($alpha, $john, $cynthia, $rashid);// Delete the objects:
?>
</body>
</html>