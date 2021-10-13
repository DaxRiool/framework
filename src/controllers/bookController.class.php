
<?php

use \RedBeanPHP\R as R;



$book = R::dispense("book");
$book->title = 'Wonders of the world';
$publisher = R::dispense("publisher");
$publisher->name = "naam_publisher";
$book->publisher = $publisher;


$author = R::dispense("author");
$author->name = "naam_author";
$book->author = $author;




$book->author = $author;
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