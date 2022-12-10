<?php

class Router {
    public function __construct() {
        $routesPath = ROOT . '/components/routes.php';
    }

    // метод будет принимать управление от фронтконтроллера
    public function run()
    {
        $uri = $this->getURI();
        $segments = explode('/', $uri);
        $controller = null;
        if ($segments[0] == "admin") {
            $string = str_replace("&", "?", $segments[1]);
            switch ($string) {
                case 'bookings':
                    include(ROOT . '/admin/view/shared/header.php');
                    include_once (ROOT . '/admin/controller/BookingsController.php');
                    $controller= new BookingsController($string);
                    break;
                case 'rooms':
                    include(ROOT . '/admin/view/shared/header.php');
                    include_once (ROOT . '/admin/controller/RoomsController.php');
                    $controller= new RoomsController();
                    break;
                case 'users':
                    include(ROOT . '/admin/view/shared/header.php');
                    include_once (ROOT . '/admin/controller/UsersController.php');
                    $controller= new UsersController($segments);
                    break;
                case 'services':
                    include(ROOT . '/admin/view/shared/header.php');
                    include_once (ROOT . '/admin/controller/ServiceController.php');
                    $controller= new ServiceController();
                    break;
                case 'payment':
                    include(ROOT . '/admin/view/shared/header.php');
                    include_once (ROOT . '/admin/controller/PaymentController.php');
                    $controller= new PaymentController();
                    break;
                case 'logout': // для пользователей
                    include_once (ROOT . '/logout.php');
                    $controller= new UsersController($segments);
                    break;
                case 'bookings?id='. $_GET["id"]:
                    include(ROOT . '/admin/view/shared/header.php');
                    include (ROOT . '/admin/controller/BookingsController.php');
                    $controller= new BookingsController($string);
                    break;
                default:
                    break;
            }
            if ($controller) {
                $controller->processMethod();
            }
            else {
                http_response_code(404);
                echo json_encode([
                    "message" => "404",
                    "uri" => $this->getURI()
                ]);
            }
        } else {
            switch ($segments[0]) {
                case 'registration': // для пользователей
                    include(ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/controller/UsersController.php');
                    $controller= new UsersController($segments);
                    break;
                case 'login': // для пользователей
                    include(ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/controller/UsersController.php');
                    $controller= new UsersController($segments);
                    break;
                case 'logout': // для пользователей
                    include(ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/logout.php');
                    $controller= new UsersController($segments);
                    break;
                case 'mybookings':
                    include(ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/controller/BookingsController.php');
                    $controller= new BookingsController();
                    break;
                case 'book': // для пользователей
                    include_once (ROOT . '/controller/BookController.php');
                    $controller= new BookController();
                    break;
                case 'rooms':
                    include(ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/controller/RoomsController.php');
                    $controller= new RoomsController();
                    break;
                case 'services':
                    include(ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/controller/ServiceController.php');
                    $controller= new ServiceController();
                    break;

                default:
                    include(ROOT . '/view/shared/header.php');
                    break;
            }
            if ($controller) {
                $controller->processMethod();
            }
            else {
                http_response_code(404);
                echo json_encode([
                    "message" => "404",
                    "uri" => $this->getURI()
                ]);
            }
        }
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            $uri = explode('q=', $_SERVER['REQUEST_URI']);
            // trim - удаляет пробелы или другие символы из начала и конца строки
            return rtrim(trim($uri[1], '/'), '&');
        }
    }
}