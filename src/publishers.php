<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="beans.css">
    <title>Document</title>
    <?php
    require 'rb.php';
    R::setup();
    R::setup('mysql:host=localhost;dbname=building_framework', 'user', 'password');
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

//$query = "SELECT * FROM publishers";
//$query = $PDO->query($query);
//$query = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $ding) {
    echo $ding["id"] . " " . $ding["name"] . "<br>";
}
?>