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
<?php
require('iSort.php');

/**
 * Class StudentsList
 */
class StudentsList
{

    private $_students = array();

    /**
     * StudentsList constructor.
     * @param $list
     */
    function __construct($list)
    {
        $this->_students = $list;
    }

    /**
     * Perform a sort using an iSort implementation:
     * @param iSort $type
     */
    function sort(iSort $type)
    {
        $this->_students = $type->sort($this->_students);
    }

    /**
     * Display the students as an HTML list:
     */
    function display()
    {
        echo '<ol>';
        foreach ($this->_students as $student) {
            echo "<li>{$student['name']} {$student['grade']}</li>";
        }
        echo '</ol>';
    }

}

$students = array(
    256 => array('name' => 'Jon', 'grade' => 98.5),
    2 => array('name' => 'Vance', 'grade' => 85.1),
    9 => array('name' => 'Stephen', 'grade' => 94.0),
    364 => array('name' => 'Steve', 'grade' => 85.1),
    68 => array('name' => 'Rob', 'grade' => 74.6)
);

$list = new StudentsList($students);

echo '<h2>Original Array</h2>';
$list->display();

$list->sort(new MultiAlphaSort('name'));
echo '<h2>Sorted by Name</h2>';
$list->display();

$list->sort(new MultiNumberSort('grade', 'descending'));
echo '<h2>Sorted by Grade</h2>';
$list->display();

unset($list);
?>
</body>
</html>