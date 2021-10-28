<?php

session_start();

include "../vendor/autoload.php";

use \RedBeanPHP\R as R;

class UserController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }
    public function setlogin()
    {
        $template = $this->twig->load('setlogin.html');
        echo $template->render();
    }

    public function setloginPOST()
    {
        $naam = $_POST["naam"];
        $wacht = $_POST["wacht"];
        $sessions = R::dispense("users");
        $sessions->username = $naam;
        $sessions->wachtwoord = $wacht;
        $id = R::store($sessions);
        header("Location: ../publisher/index");
    }

    public function loginPOST()
    {
        if (isset($_POST["naam"])) {
            $naam = $_POST["naam"];
            $wacht = $_POST["wacht"];
            $books = R::getAll("SELECT * FROM users");
            $n = $books[0]["username"];
            $w = $books[0]["wachtwoord"];
            if ($naam == $n) {
                if ($wacht == $w) {
                    $token = bin2hex(random_bytes(100));
                    $sessions = R::dispense("sessions");
                    $_SESSION["token"] = $token;
                    $_SESSION["name"] = $naam;
                    $sessions->username = $naam;
                    $sessions->token = $token;
                    R::store($sessions);
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

    public function login()
    {
        $template = $this->twig->load('login.html');
        echo $template->render();
    }

    public function logout()
    {
        echo "trashed <br>";
        $name = $_SESSION["name"];
        $var = "WHERE username = \"$name\"";
        $sessions = R::findAll('sessions', "username = \"$name\"");
        var_dump($sessions);
        R::trashAll($sessions);
        header("Location: login");
    }
}

?>