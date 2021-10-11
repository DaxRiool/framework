<?php


class UserService
{
    public function validateLoggedIn()
    {
        include "../vendor/autoload.php";
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader);
        use \RedBeanPHP\R as R;
        R::setup('mysql:host=localhost;dbname=building_framework', 'root', '');
        $books = R::getAll("SELECT * FROM sessions");
        if (!isset($books["token"])) {
            echo "<h1>token is er niet</h1>";
        }
    }
}