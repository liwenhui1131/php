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
    <title>Sorting Multidimensional Arrays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$students = array(
	256 => array('name' => 'Jon', 'grade' => 98.5),
	2 => array('name' => 'Vance', 'grade' => 85.1),
	9 => array('name' => 'Stephen', 'grade' => 94.0),
	364 => array('name' => 'Steve', 'grade' => 85.1),
	68 => array('name' => 'Rob', 'grade' => 74.6)
);

// Name sorting function:
function name_sort($x, $y) {
	return strcasecmp($x['name'], $y['name']);
}

// Grade sorting function:
// Sort in DESCENDING order!
function grade_sort($x, $y) {
	return ($x['grade'] < $y['grade']);
}

// Print the array as is:
echo '<h2>Array As Is</h2><pre>' . print_r($students, 1) . '</pre>';

// Sort by name:
uasort($students, 'name_sort');
echo '<h2>Array Sorted By Name</h2><pre>' . print_r($students, 1) . '</pre>';

// Sort by grade:
uasort($students, 'grade_sort');
echo '<h2>Array Sorted By Grade</h2><pre>' . print_r($students, 1) . '</pre>';

// Name sorting function:
function name_sort1($x, $y) {
    // Show iterations using a static variable:
    static $count = 1;
    echo "<p>Iteration $count: {$x['name']} vs. {$y['name']}</p>\n";
    $count++;
    return strcasecmp($x['name'], $y['name']);
}

// Grade sorting function:
// Sort in DESCENDING order!
function grade_sort1($x, $y) {
    // Show iterations using a static variable:
    static $count = 1;
    echo "<p>Iteration $count: {$x['grade']} vs. {$y['grade']}</p>\n";
    $count++;
    return ($x['grade'] < $y['grade']);
}

// Sort by name:
uasort($students, 'name_sort1');
echo '<h2>Array Sorted By Name</h2><pre>' . print_r($students, 1) . '</pre>';

// Sort by grade:
uasort($students, 'grade_sort1');
echo '<h2>Array Sorted By Grade</h2><pre>' . print_r($students, 1) . '</pre>';

// Sort by name:
uasort($students, function($x, $y) {
    return strcasecmp($x['name'], $y['name']);
});
echo '<h2>Array Sorted By Name</h2><pre>' . print_r($students, 1) . '</pre>';

// Sort by grade:
uasort($students, function ($x, $y) {
    return ($x['grade'] < $y['grade']);
});
echo '<h2>Array Sorted By Grade</h2><pre>' . print_r($students, 1) . '</pre>';

?>
</body>
</html>