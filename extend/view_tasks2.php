<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 * */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Tasks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Current To-Do List</h2>
<?php

/**
 * 把数组的元素打印成列表
 * @parame $parent
 * */
function make_list($parent)
{
    global $tasks;
    echo '<ol>';
    foreach ($parent as $task_id => $todo) {
        echo <<<EOT
        <li><input type="checkbox" name="tasks[$task_id]" value="done"> $todo
EOT;

        if (isset($tasks[$task_id])) {
            make_list($tasks[$task_id]);
        }
        echo '</li>';
    }
    echo '</ol>';
}


$dbc = mysqli_connect('localhost', 'username', 'password', 'test');


if (($_SERVER['REQUEST_METHOD'] == 'POST')
    && isset($_POST['tasks'])
    && is_array($_POST['tasks'])
    && !empty($_POST['tasks'])
) {


    $q = 'UPDATE tasks SET date_completed=NOW() WHERE task_id IN (';


    foreach ($_POST['tasks'] as $task_id => $v) {
        $q .= $task_id . ', ';
    }


    $q = substr($q, 0, -2) . ')';
    $r = mysqli_query($dbc, $q);


    if (mysqli_affected_rows($dbc) == count($_POST['tasks'])) {
        echo '<p>The task(s) have been marked as completed!</p>';
    } else {
        echo '<p>Not all tasks could be marked as completed!</p>';
    }

}


$q = 'SELECT task_id, parent_id, task FROM tasks WHERE date_completed="0000-00-00 00:00:00" ORDER BY parent_id, date_added ASC';
$r = mysqli_query($dbc, $q);
$tasks = array();
while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)) {
    $tasks[$parent_id][$task_id] = $task;
}


echo <<<EOT
<p>Check the box next to a task and click "Update" to mark a task as completed (it, and any subtasks, will no longer appear in this list).</p>
<form action="view_tasks2.php" method="post">
EOT;

make_list($tasks[0]);


echo <<<EOT
<input name="submit" type="submit" value="Update" />
</form>
EOT;

?>
</body>
</html>