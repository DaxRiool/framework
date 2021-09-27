<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="beans.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

$host = '127.0.0.1:3306';
$db   = 'building_framework';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$PDO = new PDO($dsn, $user, $pass);

$query = "SELECT * from book";
echo $query;
$query = $PDO->query($query);
$query = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>
            titel
        </th>
        <th>
            auteur
        </th>
        <th>
            publisher
        </th>
    </tr>
        <?php foreach ($query as $ding) {
            ?>
    <tr>
        <td> <?php echo $ding["title"]?> </td>
        <td> jfv, </td>
        <td> hvchsdcv </td>
    </tr>
</table>
            <?php
        }
        ?>
