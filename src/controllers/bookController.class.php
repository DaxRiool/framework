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


$book = R::dispense("book");
$book->title = 'Wonders of the world';
$book->author_id = 1;
$book->publisher_id = 1;
$id = R::store($book);

echo "database aangepast";

$books = R::getAll("SELECT * FROM book");
$convertedBooks = R::convertToBeans("book", $books);


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
        <?php
        foreach ($convertedBooks as $boek) {
            echo "<tr>";
            echo  "<td>" . $boek["title"] .  "</td>";
            echo "<td>" . $boek["author_id"] .  "</td>";
            echo "<td>" . $boek["publisher_id"] .  "</td>";
            echo "</tr>";
        }
        ?>
</table>
</body>
</html>