<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="beans.css">
    <title>Document</title>
    <?php

    include "../vendor/autoload.php";
    $loader = new \Twig\Loader\FilesystemLoader('views');
    $twig = new \Twig\Environment($loader);
    
    use \RedBeanPHP\R as R;
    R::setup('mysql:host=localhost;dbname=building_framework', 'root', '');
    class publisherController
    {
        public function add()
        {
            ?>
            <a href="index">terug</a>
            <h1>publisher add</h1>
            <p>name: </p>
            <form method="post">
                <input type="text" name="text">
                <input type="submit" value="add">
            </form>
            <?php
            if (isset($_POST["text"])) {
                $name = $_POST["text"];
                $query = "INSERT INTO publishers (name) VALUES (\"$name\")";
                R::exec($query);
                $id = R::getInsertID();
            }
            ?>
            <?php
        }
        public function index()
        {
            ?>
            <a href="add">add</a>
            <?php
            $books = R::getAll("SELECT * FROM publishers");
            $publish = R::convertToBeans("publishers", $books);
            ?>
            <h1>Publishers</h1>
            <?php
            foreach ($publish as $ding) {
                echo $ding["name"] . "<br>";
            }
        }
    }
    
    ?>
</head>
<body>
    
    <br><br>
</body>
</html>