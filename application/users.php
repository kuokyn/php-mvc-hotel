<?php
require('model/database.php');
require('model/user_db.php');
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$password = filter_input(INPUT_GET, "password", FILTER_VALIDATE_INT);
$name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_GET, "surname", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_GET, "phone", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_STRING);
$authority_title = "ROLE_USER";
$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'user_list';
    }
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($_GET['action']=="delete") {
            if ($_GET['phone']) {
                $count = delete_user($phone);
                header("Location: users.php");
            } else {
                $error = 'Invalid user data';
                include('view/error.php');
            }
        }
        $result = select_all_users();
        include('view/user_list.php');
        break;
    case 'POST':
        if ($phone && $name && $surname && $email && $password && $authority_title) {
            $count = insert_user($phone, $name, $email, $surname, $password, $authority_title);
            header("Location: .?action=select&user={$phone}&created={$count}");
        } else {
            $error = 'Invalid user data';
            include('view/error.php');
        }
        break;
    case 'PUT':
        if ($phone && $name && $surname && $email && $password && $authority_title) {
            $count = update_user($name, $email, $surname, $password, $authority_title, $phone);
            header("Location: .?action=select&user={$phone}&updated={$count}");
        } else {
            $error = 'Invalid user data';
            include('view/error.php');
        }
        break;
    case 'DELETE':
        if ($phone) {
            $count = delete_user($phone);
            header("Location: .?deleted={$count}");
        } else {
            $error = 'Invalid user data';
            include('view/error.php');
        }
        break;
    default:
        include('view/user_list.php');
}

