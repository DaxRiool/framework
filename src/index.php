<?php

require '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./views');
$twig = new \Twig\Environment($loader);

$name = "Daxx";

echo $twig->render('index.html', ['name' => $name]);




?>