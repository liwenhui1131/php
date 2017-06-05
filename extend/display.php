<?php
/*
 *
 * @author liwenhui <lwh1131@outlook.com>
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cities and Zip Codes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$state = 'AK';
$items = 5;

echo "<h1>Cities and Zip Codes found in $state</h1>";

$dbc = mysqli_connect('localhost', 'username', 'password', 'zips');
$q = "SELECT city, zip_code FROM zip_codes WHERE state='$state' ORDER BY city";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) > 0) {
    echo '<table border="2" width="90%" cellspacing="3" cellpadding="3" align="center">';
    $i = 0;

    while (list($city, $zip_code) = mysqli_fetch_array($r, MYSQLI_NUM)) {
        if ($i == 0) {
            echo '<tr>';
        }
        echo "<td align=\"center\">$city, $zip_code</td>";
        $i++;
        if ($i == $items) {
            echo '</tr>';
            $i = 0;
        }
    }

    if ($i > 0) {
        for (; $i < $items; $i++) {
            echo "<td>&nbsp;</td>\n";
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p class="error">An invalid state abbreviation was used.</p>';
}

mysqli_close($dbc);

$zip = 64154;

echo "<h1>Nearest stores to $zip:</h1>";

$dbc = mysqli_connect('localhost', 'username', 'password', 'zips');

$q = "SELECT latitude, longitude FROM zip_codes WHERE zip_code='$zip' AND latitude IS NOT NULL";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) == 1) {
    list($lat, $long) = mysqli_fetch_array($r, MYSQLI_NUM);

    $q = "SELECT name, CONCAT_WS('<br>', address1, address2), city, state, stores.zip_code, phone, ROUND(DEGREES(ACOS(SIN(RADIANS($lat)) 
* SIN(RADIANS(latitude)) 
+ COS(RADIANS($lat))  
* COS(RADIANS(latitude))
* COS(RADIANS($long - longitude)))) * 69.09) AS distance FROM stores LEFT JOIN zip_codes USING (zip_code) ORDER BY distance ASC LIMIT 3";
    $r = mysqli_query($dbc, $q);

    if (mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
            echo "<h2>$row[0]</h2>
    <p>$row[1]<br>" . ucfirst(strtolower($row[2])) . ", $row[3] $row[4]<br>
    $row[5] <br>
    (approximately $row[6] miles)</p>\n";
        }
    } else {
        echo '<p class="error">No stores matched the search.</p>';
    }
} else {
    echo '<p class="error">An invalid zip code was entered.</p>';
}

mysqli_close($dbc);

?>
</body>
</html>