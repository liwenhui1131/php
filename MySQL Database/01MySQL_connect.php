<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL Connect</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";

$conn = new mysqli('localhost', 'root', 'rootroot');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully" . "<br>";

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" . "<br>";

mysqli_close($conn)
?>

<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";

try {
    $conn = new PDO("mysql:host=$servername;dbname=mySQL", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>
</body>
</html>