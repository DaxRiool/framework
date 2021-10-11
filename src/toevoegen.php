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


require 'rb.php';
    R::setup();
    R::setup('mysql:host=localhost;dbname=building_framework', 'user', 'password');

if (isset($_POST["text"])) {
    $name = $_POST["text"];
    $query = "INSERT INTO publishers
    (name) VALUES (\"$name\")";
    $query = $PDO->query($query);
}
?>

