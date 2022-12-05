<?php
/*require('../model/database.php');
require('../model/Booking.php');
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
                header("Location: BookingsController.php");
            } else {
                $error = 'Invalid booking data';
                include('../view/shared/error.php');
            }
        }
        $result = select_all_bookings();
        include('../view/booking_list.php');
        break;
    case 'POST':
        if ($room_id && $user_id && $people && $check_in_date && $check_out_date) {
            $count = insert_booking($room_id, $user_id, $check_in_date ,$check_in_date, $people);
            header("Location: .?action=select&booking={$id}&created={$count}");
        } else {
            $error = 'Invalid booking data';
            include('../view/shared/error.php');
        }
        break;
    case 'PUT':
        if ($id && $room_id && $user_id && $people && $check_in_date && $check_out_date) {
            $count = update_booking($id, $room_id, $user_id, $check_in_date ,$check_out_date, $people);
            header("Location: .?action=select&booking={$id}&updated={$count}");
        } else {
            $error = 'Invalid booking data';
            include('../view/shared/error.php');
        }
        break;
    case 'DELETE':
        if ($id) {
            $count = delete_booking($id);
            header("Location: .");
        } else {
            $error = 'Invalid booking data';
            include('../view/shared/error.php');
        }
        break;
    default:
        include('../view/booking_list.php');
}*/

include_once(ROOT . '/model/Booking.php');

class BookingsController
{

    public function processMethod()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                if (!isset($_GET["action"])) {
                    $this->getBookingList();
                }
                if ($_GET["action"] == "update" && isset($_GET['id'])) {
                    $booking = Booking::getBookingById($_GET['id']);
                    $people = $booking["people"];
                    $time = strtotime($booking["check_in_date"]);
                    $newformat = date('Y-m-d',$time);
                    $check_in_date = $newformat;
                    $time = strtotime($booking["check_out_date"]);
                    $newformat = date('Y-m-d',$time);
                    $check_out_date = $newformat;
                    $room_id= $booking["room_id"];
                    $user_id = $booking["user_id"];
                    $id = $booking["id"];
                    include(ROOT . "/view/booking/update_booking.php");
                }
                if ($_GET["action"] == "delete" && isset($_GET['id'])) {
                    $this->deleteBooking($_GET["id"]);
                }
                if (!isset($_GET['action']) && isset($_GET['id'])) {
                    $this->getBooking($_GET["id"]);
                }
                break;
            case 'POST':
                if (isset($_POST["action"]) && isset($_POST["id"])) {
                    $this->updateBooking($_POST["id"]);
                    include(ROOT . "/view/shared/success.php");
                }
                else if (isset($_POST["people"]) && isset($_POST["check_in_date"]) && isset($_POST["check_out_date"]) && isset($_POST["user_id"]) && isset($_POST["room_id"])) {
                    $count = $this->createBooking();
                    include(ROOT . "/view/shared/success.php");
                } else {
                    $error = 'Invalid booking data provided';
                    include(ROOT . "/view/shared/error.php");
                }
                break;
            case 'PUT':
                if ($_POST["id"] && $_POST["people"] && $_POST["check_in_date"] && $_POST["check_out_date"] && $_POST["user_id"] && $_POST["room_id"]) {
                    $this->updateBooking($_POST["id"]);
                } else {
                    $error = 'Invalid booking data';
                    include(ROOT . "/view/shared/error.php");
                }
                break;
            case 'DELETE':
                if ($_GET["id"]) {
                    $this->deleteBooking($_GET["id"]);
                }
                break;
            default:
                break;
        }

    }

    public function getBookingList()
    {
        $result = Booking::getBookingList();
        json_encode($result);
        include(ROOT . "/view/booking/booking_list.php");
    }

    public function getBooking($id)
    {
        if ($id) {
            // обращение к статическому методу модели
            $booking = Booking::getBookingById($id);
            include ROOT . "/view/booking/booking.php";
        }
    }

    public function createBooking()
    {
        $people = $_POST["people"];
        $time = strtotime($_POST["check_in_date"]);
        $newformat = date('Y-m-d h:i:s',$time);
        $check_in_date = $newformat;
        $time = strtotime($_POST["check_out_date"]);
        $newformat = date('Y-m-d h:i:s',$time);
        $check_out_date = $newformat;
        $room_id= $_POST["room_id"];
        $user_id = $_POST["user_id"];
        return Booking::createBooking($room_id, $user_id, $check_in_date, $check_out_date, $people);
    }

    public function updateBooking($id)
    {
        $booking = Booking::getBookingById($id);
        $people = $_POST["people"];
        $time = strtotime($_POST["check_in_date"]);
        $newformat = date('Y-m-d h:i:s',$time);
        $check_in_date = $newformat;
        $time = strtotime($_POST["check_out_date"]);
        $newformat = date('Y-m-d h:i:s',$time);
        $check_out_date = $newformat;
        $room_id= $_POST["room_id"];
        $user_id = $_POST["user_id"];
        return Booking::updateBooking($id, $room_id, $user_id, $check_in_date, $check_out_date, $people);
    }

    public function deleteBooking($id)
    {
        if ($id) {
            Booking::deleteBooking($id);
            include(ROOT . "/view/shared/success.php");
        } else {
            $error = 'Invalid booking data';
            include(ROOT . "/view/shared/error.php");
        }
    }
}