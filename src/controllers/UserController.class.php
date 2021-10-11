<?php

include "../vendor/autoload.php";
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);

use \RedBeanPHP\R as R;
R::setup('mysql:host=localhost;dbname=building_framework', 'root', '');
class UserController
{
    public function login()
    {
        ?>
        <h1>login</h1>
        <form method="post">
            <p>naam</p>
            <input type="text" name="naam">
            <br>
            <p>wachtwoord</p>
            <input type="password" name="wacht">
            <br>
            <input type="submit" value="verstuur">
        </form>
        <?php
        if (isset($_POST["naam"])) {
            $naam = $_POST["naam"];
            $wacht = $_POST["wacht"];
            $books = R::getAll("SELECT * FROM users");
            $n = $books[0]["username"];
            $w = $books[0]["wachtwoord"];
            if ($naam == $n) {
                if ($wacht == $w) {
                    $token = bin2hex(random_bytes(100));
                    $query = "INSERT INTO sessions (username, token) VALUES (\"$naam\", \"$token\")";
                    R::exec($query);
                    $id = R::getInsertID();
                } elseif ($wacht !== $w) {
                    echo "verkeerde wachtwoord";
                }
            } elseif ($naam !== $n) {
                echo "verkeerde naam";
            }
        }
    }
}

?>