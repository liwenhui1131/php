<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL mysqli</title>
</head>
<body>
<?
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

$conn = new mysqli('localhost', 'root', 'rootroot', 'myDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO personalInfo (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO personalInfo (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO personalInfo (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$conn = new mysqli('localhost', 'root', 'rootroot', 'myDB');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO personalInfo (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();

$conn = new mysqli('localhost', 'root', 'rootroot', 'myDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

$conn = mysqli_connect('localhost', 'root', 'rootroot', 'myDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>