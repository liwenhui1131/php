<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sessions</title>
</head>
<body>
<?php
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.<br>";

echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";

print_r($_SESSION);
echo "<br>";

$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);

session_unset();
session_destroy();
?>
</body>
</html>