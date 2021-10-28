    <?php

    include "../vendor/autoload.php";
    
    include "./services/UserService.class.php";
    
    use \RedBeanPHP\R as R;

    class publisherController
    {
        private $twig;

        public function __construct($twig) {
            $this->twig = $twig;
        }

        public function add()
        {
            $validate = new UserService();
            $validate->validateLoggedIn2();
            $template = $this->twig->load('index.html');
            echo $template->render();
        }

        public function addPOST()
        {
            $validate = new UserService();
            $validate->validateLoggedIn2();
            $name = $_POST["text"];
            $sessions = R::dispense("publishers");
            $sessions->name = $name;
            R::store($sessions);
            $id = R::getInsertID();
            header("Location:./index");
        }

        public function index()
        {
            $validate = new UserService();
            $validate->validateLoggedIn2();
            $books = R::getAll("SELECT * FROM publishers");
            $publish = R::convertToBeans("publishers", $books);
            $template = $this->twig->load('publish.html');
            echo $template->render(["publishers" => $publish]);
            foreach ($publish as $ding) {
                echo $ding["name"] . "<br>";
            }
        }
    }
    
    ?>
</head>
<body>
    
    <br><br>
</body>
</html>