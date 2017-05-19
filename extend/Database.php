<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fetch()方法</title>
</head>
<style type="text/css">
    body, td, th {
        font-size: 12px;
    }
</style>
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table id="__01" width="1004" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="5">
            <img src="../images/index_01.jpg" width="1004" height="182" alt=""></td>
    </tr>
    <tr>
        <td rowspan="3">
            <img src="../images/index_03.jpg" width="320" height="317" alt=""></td>
        <td colspan="3">
            <img src="../images/index_04.jpg" width="535" height="55" alt=""></td>
        <td rowspan="3">
            <img src="../images/index_05.jpg" width="149" height="317" alt=""></td>
    </tr>
    <tr>
        <td rowspan="2">
            <img src="../images/index_06.jpg" width="47" height="262" alt=""></td>
        <td width="450" height="235" align="center" valign="top" background="../images/index_07.jpg">
            <table width="400" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="30" align="center"><strong>ID</strong></td>
                    <td align="center"><strong>PDO</strong></td>
                    <td align="center"><strong>数据库</strong></td>
                    <td align="center"><strong>时间</strong></td>
                    <td align="center"><strong>操作</strong></td>
                </tr>

                <?php
                $dbms = 'mysql';
                $host = 'localhost';
                $dbName = 'db_database19';
                $user = 'root';
                $pass = '111';
                $dsn = "$dbms:host=$host;dbname=$dbName";
                try {
                    $pdo = new PDO($dsn, $user, $pass);
                    $query = "select * from tb_pdo_mysql";
                    $result = $pdo->prepare($query);
                    $result->execute();
                    while ($res = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td height="22" align="center" valign="middle"><?php echo $res['id']; ?></td>
                            <td align="center" valign="middle"><?php echo $res['pdo_type']; ?></td>
                            <td align="center" valign="middle"><?php echo $res['database_name']; ?></td>
                            <td align="center" valign="middle"><?php echo $res['dates']; ?></td>
                            <td align="center" valign="middle"><a href="#">删除</a></td>
                        </tr>
                        <?php
                    }
                } catch (PDOException $e) {
                    die ("Error!: " . $e->getMessage() . "<br/>");
                }
                ?>
            </table>
        </td>
        <td rowspan="2">
            <img src="../images/index_08.jpg" width="38" height="262" alt=""></td>
    </tr>
    <tr>
        <td>
            <img src="../images/index_09.jpg" width="450" height="27" alt=""></td>
    </tr>
    <tr>
        <td colspan="5">
            <img src="../images/index_11.jpg" width="1004" height="85" alt=""></td>
    </tr>
    <tr>
        <td colspan="5">
            <img src="../images/index_12.jpg" width="1004" height="5" alt=""></td>
    </tr>
</table>

</body>
</html>