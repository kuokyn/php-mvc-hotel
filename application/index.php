<?php
/*
 * 1. Общие настройки (включение-выключение ошибок, установка констант и др.)
 * 2. Подключение файлов системы
 * 3. Установка соединения с базой данных
 * 4. Вызов Router
*/
session_start();
require('model/database.php');
//include('view/shared/header.php');
require('components/Router.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('ROOT', dirname(__FILE__));
$router = new Router();
$router->run();
include('view/shared/footer.php');


