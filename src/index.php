<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="beans.css">
    <title>Document</title>
    <?php
    $host = '127.0.0.1:3306';
    $db   = 'building_framework';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $PDO = new PDO($dsn, $user, $pass);
    ?>
</head>
<body>
    <a href="publishers.php">publishers</a>
    <h1>books
    </h1>
    <br><br>
</body>
</html>
<?php

$query = "SELECT * FROM book";
$query = $PDO->query($query);
$query = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $ding) {
    echo $ding["title"] . "<br>";
}
?>
