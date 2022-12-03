<?php
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($_GET['controller']) {
            case 'users':
                include("users.php");
                break;
            case 'rooms':
                include("rooms.php");
                break;
            default:
                break;
        }
    default:
        include('view/index.php');
}

