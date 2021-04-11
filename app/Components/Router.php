<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.08.2018
 * Time: 11:09
 */

namespace App\Components;

class Router
{
    private $routes;

    //при создании объекта класса  Router его свойство $routes наполняетс ямаршрутами, хранящимися в файле /app/Configs/routes.php
    public function __construct()
    {
        $routePath = ROOT . '/app/Configs/routes.php';
        $this->routes = include($routePath);
    }

    //получаем строку запроса
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    //метод run() - запуск маршрута
    function run()
    {
        try {
            //получаем наш запрос без слэша в начале    /news/sport/juventus-jenoa-anons-matcha -> news/sport/juventus-jenoa-anons-matcha
            $uri = $this->getUri();
            //пребираем у объекта все маршруты поочередно
            //шаблон маршрута присваиваем в цикле переменной $uriPattern
            //а в переменную $path записываем путь с параметрами подстановки
            foreach ($this->routes as $uriPattern => $path) {
                //если наш запрос совпадает с шаблоном в массиве
                if (preg_match("~$uriPattern~", $uri)) {
                    //получаем строку адреса в виде внутреннего маршрута с подставновкой из routers.php
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri); // получаем строку адреса в нужном нам виде


                    $segments = explode('/', $internalRoute); // разбиваем строку адреса на части в массив

                    $controllerName = '\\App\\Controllers\\'. ucfirst(array_shift($segments) . 'Controller'); // первый элемент массива берём в имя контроллера

                    $actionName = array_shift($segments); // второй элемент массива берём в имя экшена-обработчика

                    $parameters = $segments;

                    $controllerObject = new $controllerName;
var_dump($actionName);die;
                    call_user_func_array([$controllerObject, $actionName], $parameters);

                    exit();
                }
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        include ROOT . '/404.html';
    }
}

?>