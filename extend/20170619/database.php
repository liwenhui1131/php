<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * 使用 new mysqli方法连接数据库，如果出错显示错误信息
 */
$conn = new mysqli('localhost', 'root', 'rootroot', 'myDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * 根据id, firstname和lastname查询数据库，返回并打印结果
 */
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

/**
 * 使用 mysqli_connect方法连接数据库，如果出错显示错误信息
 */
$conn = mysqli_connect('localhost', 'root', 'rootroot', 'myDB');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/**
 * 根据id, firstname和lastname查询数据库，返回并打印结果
 */
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

/**
 * 使用 new mysqli方法连接数据库，如果出错显示错误信息
 */
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * 根据id, firstname和lastname查询数据库，返回并打印结果
 */
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
