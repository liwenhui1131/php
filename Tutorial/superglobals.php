<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SuperGLobals</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit">
</form>

<?php
$x = 14;
$y = 15;
function sum()
{
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

sum();
echo $z . '<br>';

echo $_SERVER['PHP_SELF'] . '<br>';
echo $_SERVER['SERVER_NAME'] . '<br>';
echo $_SERVER['HTTP_HOST'] . '<br>';
echo $_SERVER['HTTP_REFERER'] . '<br>';
echo $_SERVER['HTTP_USER_AGENT'] . '<br>';
echo $_SERVER['SCRIPT_NAME'] . '<br>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name . '<br>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name . '<br>';
    }
}
?>
</body>
</html>