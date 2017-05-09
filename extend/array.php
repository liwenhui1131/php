<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array Advanced</title>
</head>
<body>
<?php
$students = array(
    1 => array('name' => 'lisi', 'grade' => 67),
    2 => array('name' => 'zhangsan', 'grade' => '98'),
    3 => array('name' => 'liwenhui', 'grade' => 88),
    4 => array('name' => 'lingna', 'grade' => 100),
    5 => array('name' => 'xos', 'grade' => 60)
);

function nameSort($x, $y)
{
    return strcasecmp($x['name'], $y['name']);
}

function gradeSort($x, $y)
{
    return ($x['grade'] < $y['grade']);
}

echo '<h2>Array as is: </h2>' . print_r($students, 1) . '<br>';

uasort($students, 'nameSort');
echo '<h2>Array as is: </h2>' . print_r($students, 1) . '<br>';

uasort($students, 'gradeSort');
echo "<h2>Array as is: </h2>" . print_r($students, 1) . '<br>';

usort($students, 'gradeSort');
echo "<h2>Array as is: </h2>" . print_r($students, 1) . '<br>';

?>
</body>
</html>