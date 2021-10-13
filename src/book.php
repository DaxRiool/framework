<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="beans.css">
    <title>Document</title>
</head>
<body>
<?php

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);

use \RedBeanPHP\R as R;
R::setup('mysql:host=localhost;dbname=building_framework', 'root', '');

class book
{
    public function index() 
    {
        $publisher = R::dispense("book");
        R::store($publisher);
    }
}

?>
<h1></h1>
<table>
    <tr>
        <th>
            titel
        </th>
        <th>
            auteur
        </th>
        <th>
            publisher
        </th>
    </tr>
        <?php foreach ($query as $ding) {
            ?>
    <tr>
        <td> <?php echo $ding["title"]?> </td>
        <td> jfv, </td>
        <td> hvchsdcv </td>
    </tr>
</table>
            <?php
        }
        ?>
</body>
</html>