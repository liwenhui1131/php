<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>05Get Last Id</title>
</head>
<body>
<?php
$conn = new mysqli("localhost", 'root', 'rootroot');
if ($count->connect_error) {
    die("connection failed：$conn->connect_errno");
}

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

$conn->close();

$conn = new mysqli("localhost", 'root', 'rootroot', 'myDB');
if ($count->connect_error) {
    die("connection failed：$conn->connect_errno");
}

$sql = "CREATE TABLE personalInfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$sql = "INSERT INTO personalInfo(firstname,lastname,email) VALUE('li','si','lwh1131@outlook.com')";

if ($conn->query($sql) === true) {
    $lastId = $conn->insert_id;
    echo "new record created successfully.last inserted Id is:$lastId ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
$conn = mysqli_connect('localhost', 'root', 'rootroot', 'myDB');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

$sql = "INSERT INTO personalInfo(firstname,lastname,email) VALUE('li','si','lwh1131@outlook.com')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn)
?>

<?php
try {
    $conn = new PDO("mysql:host='localhost';dbname='mySQL'", 'root', 'rootroot');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . "<br>";
}

try {
    $conn = new PDO("mysql:host='localhost';dbname='myDBPDO'", 'root', 'rootroot');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO personalInfo (firstname, lastname, email)
    VALUES ('li','si','lwh1131@outlook.com')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
</body>
</html>