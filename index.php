<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.08.2018
 * Time: 10:45
 */
//настройки отображения ошибок
ini_set('display_errors', 1);
//отображать все ошибки
error_reporting(E_ALL);

//определяем корневую директорию C:\OpenServer\domains\mvc.local
define('ROOT', dirname(__FILE__));

//подключаем composer
require __DIR__ . '/vendor/autoload.php';

//подключаем класс роутер
use App\Components\Router;

//создаем обект роутера - для определния маршрута
$router = new Router();

//запускаем метод run объекта класса роутер
$router->run();
?>