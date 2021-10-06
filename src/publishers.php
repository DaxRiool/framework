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
    <a href="index.php">books</a>
    <h1>publishers</h1>
    <a href="toevoegen.php"><button>toevoegen</button></a>
    <br><br>
</body>
</html>
<?php

$query = "SELECT * FROM publishers";
$query = $PDO->query($query);
$query = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $ding) {
    echo $ding["id"] . " " . $ding["name"] . "<br>";
}
?>