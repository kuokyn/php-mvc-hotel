<?php
/*switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        switch ($_GET['controller']) {
            case 'users':
                include("../controller/UsersController.php");
                break;
            case 'rooms':
                include("../controller/RoomsController.php");
                break;
            case 'bookings':
                include("../controller/BookingsController.php");
                break;
            default:
                break;
        }
    default:
        include('../view/index.php');}*/

/*
 * 1. Анализ запроса и определение контроллера, который будет обрабатывать этот запрос
(если строка запроса - /news, то обрабатывать этот запрос должен контроллер NewsController.php,
если стока запроса - /article, то обрабатывать этот запрос должен контроллер ArticleController.php и т. д.)
 * 2. Затем роутер подключает файл с классом контроллера
 * 3. После этого он передает ему управление (например - NewsController.php )
*/

class Router {
    private $routes;
    public function __construct() {
        $routesPath = ROOT . '/components/routes.php';
        $this->routes = include($routesPath);
    }

    // метод будет принимать управление от фронтконтроллера
    public function run()
    {
        $uri = $this->getURI();
        $segments = explode('/', $uri);
        $entity = explode('&', array_shift($segments));
        switch ($entity[0]) {
            case 'bookings':
                include_once (ROOT . '/controller/BookingsController.php');
                $controller= new BookingsController();
                $controller->processMethod();
                break;
            case '':
                include_once (ROOT . '/main.php');
                break;
            default:
                include_once (ROOT . '/view/shared/error.php');
                break;
        }
        /*foreach($this->routes as $uriPattern => $path)
        {
            // Получаем:  news -> news/index products -> products/list
            if(preg_match("~$uriPattern~", $uri))
            {
                // Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern,~", $path, $uri);
                // echo '<br><br>Нужно сформировать: ' . $internalRoute;

                // Определяем контроллер, action, параметры
                // Контроллер и action мы определяем с помощью старого кода
                // ($internalRoute вместо $path)

                // Если есть совпадение, определить какой контроллер и
                // action обрабатывают запрос
                $segments = explode('/', $internalRoute);

                // Получаем имя контроллера:
                $controllerName = array_shift($segments) . 'Controller';

                // делает первую букву строки заглавной
                $controllerName = ucfirst($controllerName);

                // Точно также получаем название экшена:
                $actionName = 'action' . ucfirst(array_shift($segments));
                $uri1 = explode('/', $uri);
                if (sizeof($uri1)==1) {
                    $actionName = "actionIndex";
                }
                // в итоге получаем:
                // имя класса:
                // echo '<br><br>Controller name: ' . $controllerName;
                // имя метода
                // echo '<br>action name: ' . $actionName;

                // В итоге, в массиве ($segments) останутся только параметры
                // массив с параметрами:
                $parameters = $segments;
                // Определяем путь к файлу, который нужно подключить:
                $controllerFile = ROOT . '/controller/' . $controllerName . '.php';

                // проверяем: если такой файл существует, то подключаем его
                if(file_exists($controllerFile))
                {
                    include_once ($controllerFile);
                }
                // создаем объект класса контроллера
                $controllerObject = new $controllerName;

                // для этого объекта мы вызываем метод (action)
                // массив ($parameters) мы можем просто передать нашему экшену,
                // используя ранее написаный код:
                //$result = $controllerObject -> $actionName($parameters);

                // используем функцию: call_user_func_array()
                // Эта функция вызывает экшен с именем,
                // которое содержится в переменной $actionName,
                // у объекта - $controllerObject,
                // при этом передает ему массив с параметрами ($parameters)

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters );

            }
        }*/
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            $uri = explode('=', $_SERVER['REQUEST_URI']);
            // trim - удаляет пробелы или другие символы из начала и конца строки
            return rtrim(trim($uri[1], '/'), '&');
        }
    }
}
/*
$controller_name = 'main';
$action_name = 'index';

$routes = explode('/', $_SERVER['REQUEST_URI']);

// получаем имя контроллера
if ( !empty($routes[1]) )
{
    $controller_name = $routes[1];
}

// получаем имя экшена
if ( !empty($routes[2]) )
{
    $action_name = $routes[2];
}

// добавляем префиксы
$model_name = 'model_'.$controller_name;
$controller_name = 'controller_'.$controller_name;
$action_name = 'action_'.$action_name;

/*
echo "Model: $model_name <br>";
echo "Controller: $controller_name <br>";
echo "Action: $action_name <br>";


// подцепляем файл с классом модели (файла модели может и не быть)

$model_file = strtolower($model_name).'.php';
$model_path = "application/model/".$model_file;
if(file_exists($model_path))
{
    include "application/model/".$model_file;
}

// подцепляем файл с классом контроллера
$controller_file = strtolower($controller_name).'.php';
$controller_path = "application/controller/".$controller_file;
if(file_exists($controller_path))
{
    include "application/controller/".$controller_file;
}
else
{
    include "application/view/shared/error.php";
}

// создаем контроллер
$controller = new $controller_name;
$action = $action_name;

if(method_exists($controller, $action))
{
    // вызываем действие контроллера
    $controller->$action();
}
else
{
    include "application/view/shared/error.php";
}*/

