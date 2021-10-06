<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="beans.css">
    <title>Document</title>
</head>
<body>
    <a href="publishers.php">terug</a>
    <h1>publisher toevoegen</h1>
    <form method="post">
        <p>naam: </p><input type="text" name="text">
        <input type="submit" name="submit">
    </form>
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


if (isset($_POST["text"])) {
    $name = $_POST["text"];
    $query = "INSERT INTO publishers
    (name) VALUES (\"$name\")";
    $query = $PDO->query($query);
}
?>

