<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Open/Close</title>
</head>
<body>
<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile, filesize("webdictionary.txt")) . "<br>";
fclose($myfile);

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fgets($myfile) . "<br>";
fclose($myfile);

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    echo fgetc($myfile);
}
fclose($myfile);
?>

</body>
</html>