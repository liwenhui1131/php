<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL Create DB</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

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

$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>

<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";

try {
    $conn = new PDO("mysql:host=$servername;dbname=mySQL", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . "<br>";
}

$conn = null;
?>
</body>
</html>