<?php

use \RedBeanPHP\R as R;

class UserService
{
    public function validateLoggedIn()
    {
        include "../vendor/autoload.php";
        $books = R::getAll("SELECT * FROM sessions");
        if (empty($books[0]["token"])) {
            echo "token is er niet";
            header("Location: ../user/login");
        }
    }
}