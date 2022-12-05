<?php
/*require('../model/database.php');
require('../model/model_room.php');
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$chambers = filter_input(INPUT_POST, "chambers", FILTER_VALIDATE_INT);
$people = filter_input(INPUT_POST, "people", FILTER_VALIDATE_INT);
$room_type_title = filter_input(INPUT_POST, "room_type_title", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$chambers = filter_input(INPUT_GET, "chambers", FILTER_VALIDATE_INT);
$people = filter_input(INPUT_GET, "people", FILTER_VALIDATE_INT);
$room_type_title = filter_input(INPUT_GET, "room_type_title", FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'room_list';
    }
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($_GET['action']=="delete") {
            if ($_GET['id']) {
                $count = delete_room($id);
                header("Location: RoomsController.php");
            } else {
                $error = 'Invalid room data';
                include('../view/shared/error.php');
            }
        }
        $result = select_all_rooms();
        include('../view/room_list.php');
        break;
    case 'POST':
        if ($id && $chambers && $people && $room_type_title) {
            $count = insert_room($id, $chambers, $people, $room_type_title);
            header("Location: .?action=select&room={$id}&created={$count}");
        } else {
            $error = 'Invalid room data';
            include('../view/shared/error.php');
        }
        break;
    case 'PUT':
        if ($id && $chambers && $people && $room_type_title) {
            $count = update_room($id, $chambers, $people, $room_type_title);
            header("Location: .?action=select&room={$id}&updated={$count}");
        } else {
            $error = 'Invalid room data';
            include('../view/shared/error.php');
        }
        break;
    case 'DELETE':
        if ($id) {
            $count = delete_room($id);
            header("Location: .");
        } else {
            $error = 'Invalid room data';
            include('../view/shared/error.php');
        }
        break;
    default:
        include('../view/room_list.php');
}*/

class RoomsController
{
    public function actionIndex()
    {
        return true;
    }
}