<?php

include "../vendor/autoload.php";

use \RedBeanPHP\R as R;

class UserController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function login()
    {
            $template = $this->twig->load('login.html');
            echo $template->render();
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
                    header("Location: ../publisher/index");
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