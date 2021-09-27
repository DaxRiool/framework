<?php

include "./vendor/autoload.php";

$a = explode("/", $_SERVER['REQUEST_URI']);

if (empty($a[2])) {
    $resource = "home";
} else {
    $resource = $a[2];
}
if (isset($a[3])) {
    $method = $a[3];
} else {
    $method = "index";
}



$controllerPath = "controllers/{$resource}Controller.class.php";

if (file_exists($controllerPath)) {
    include $controllerPath;
} else {
    header("HTTP/1.0 404 Not Found");
    echo "geen controller";
    exit;
}

if (!method_exists("{$resource}Controller", $method)) {
    header("HTTP/1.0 404 Not Found");
    echo "geen method";
    exit;
}

$controllerClass = "{$resource}Controller";

$controller = new $controllerClass();

$controller->{$method}();

?>