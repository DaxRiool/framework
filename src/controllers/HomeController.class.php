<?php

include "../vendor/autoload.php";
    
include "./services/UserService.class.php";

use \RedBeanPHP\R as R;
class HomeController
{
    private $twig;

    public function __construct($twig) 
    {
        $this->twig = $twig;
    }

    public function index()
    {   
        $validate = new UserService();
        $validate->validateLoggedIn();
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
        $template = $this->twig->load('home.html');
        echo $template->render(["books" => $convertedBooks]);
    }
}
?>
    