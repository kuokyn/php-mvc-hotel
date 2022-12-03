<?php
require('model/database.php');
require('model/booking_db.php');
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$user_id = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_STRING);
$room_id = filter_input(INPUT_POST, "booking_id", FILTER_VALIDATE_INT);
$check_in_date = filter_input(INPUT_POST, "check_out_date", FILTER_SANITIZE_STRING);
$check_out_date = filter_input(INPUT_POST, "check_out_date", FILTER_SANITIZE_STRING);
$people = filter_input(INPUT_POST, "people", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$user_id = filter_input(INPUT_GET, "user_id", FILTER_SANITIZE_STRING);
$room_id = filter_input(INPUT_GET, "booking_id", FILTER_VALIDATE_INT);
$check_in_date = filter_input(INPUT_GET, "check_in_date", FILTER_SANITIZE_STRING);
$check_out_date = filter_input(INPUT_GET, "check_out_date", FILTER_SANITIZE_STRING);
$people = filter_input(INPUT_GET, "people", FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'booking_list';
    }
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($_GET['action'] == "delete") {
            if ($_GET['id']) {
                $count = delete_booking($id);
                header("Location: bookings.php");
            } else {
                $error = 'Invalid booking data';
                include('view/error.php');
            }
        }
        $result = select_all_bookings();
        include('view/booking_list.php');
        break;
    case 'POST':
        if ($room_id && $user_id && $people && $check_in_date && $check_in_date) {
            $count = insert_booking($room_id, $user_id, $check_in_date ,$check_in_date, $people);
            header("Location: .?action=select&booking={$id}&created={$count}");
        } else {
            $error = 'Invalid booking data';
            include('view/error.php');
        }
        break;
    case 'PUT':
        if ($id && $room_id && $user_id && $people && $check_in_date && $check_in_date) {
            $count = update_booking($id, $room_id, $user_id, $check_in_date ,$check_in_date, $people);
            header("Location: .?action=select&booking={$id}&updated={$count}");
        } else {
            $error = 'Invalid booking data';
            include('view/error.php');
        }
        break;
    case 'DELETE':
        if ($id) {
            $count = delete_booking($id);
            header("Location: .");
        } else {
            $error = 'Invalid booking data';
            include('view/error.php');
        }
        break;
    default:
        include('view/booking_list.php');
}

