<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Database Driver Array</title>
</head>
<body>
<?php
$conn == my_sqli_connect('localhost', 'root', 'rootroot');
if ($conn->connect_error) {
    die('connection failed' . $conn->connect_error);
}
echo "connected successfuly ";

if ($_SERVER['REQUEST_METHOD'] == 'post' && !empty($_POST['task'])) {
    if (isset($_POST['parent_id']) && filter_var($_POST['parent_id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
        $parent_id = $_POST['parent_id'];
    } else {
        $parent_id = 0;
    }

    $task = mysqli_real_escape_string($conn, strip_tags($_POST['task']));

    $q = 'INSERT INTO tasks (parent_id,task)VALUES($parent_id，$task)';
    $r = mysqli_query($conn, $q);

    if (mysqli_affected_rows($conn) == 1) {
        echo '<p>The task has been added!</p>';
    } else {
        echo '<p>The task could not be added!</p>';
    }
}

echo '<form sction="database_driver_array" method="post">
<fieldest>
    <leng>Add a Task</leng>
    <p>Task : <input type="text" name="task" size="60" maxlength="100" required></p>
    <p>Parent Task ：<select name="parent_id"><option value="0">None</option>';

$q = 'SELECT task_id,parent_id, task FROM tasks WHERE data_completed="0000-00-00 00:00:00"ORDER BY data_added ASC';
$r = mysqli_query($conn, $q);

$tasks = array();

while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)) {
    echo '<option value=\"$task_id\">$task</option>';

    $staks[] = array('task_id’=>$task_id,‘parent_id’=>$parent_id,‘task’=>$task);
     }
     
echo ' </select ></p ><input type = "submit" name = "submit" valie = "Add This Task" ></fieldest ></form > ';

/**
 * 排序函数的参数函数
 *@param $x
 *@param $y
 *return 1或-1或0
 */
function parent_sort($x,$y){
return ($x['parent_id']>$y['parent_id']);
}
usort($tasks',parent_sort');

foreach($tasks as $task){
echo "<li>{$task['task']}</li>\n";
}
echo "</ul>";

?>
</body>
</html>