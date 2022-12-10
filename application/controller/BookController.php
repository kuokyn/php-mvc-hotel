<?php

include_once(ROOT . '/admin/model/Booking.php');

class BookController
{

    public function processMethod()
    {
        $isSet = isset($_POST["people"]) && isset($_POST["check_in_date"]) && isset($_POST["check_out_date"]) && isset($_POST["user_id"]) && isset($_POST["room_id"]);
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                if (isset($_SESSION["login"])) {
                    include_once (ROOT . '/view/shared/header.php');
                    include_once (ROOT . '/view/booking/book_form.php');
                }
                else
                    header("Location: /login");
                break;
            case 'POST':
                include_once (ROOT . '/view/shared/header.php');
                include_once (ROOT . '/view/booking/book_form.php');
                if ($isSet) {
                    $booking = $this->createBooking();
                    if ($booking) {
                        http_response_code(201);
                        echo json_encode([
                            "message" => "Booking ". $booking['id']. " was created",
                            "created" => $booking
                        ]);
                    }
                    else {
                        echo json_encode([
                            "message" => "Booking was NOT created, database error"
                        ]);
                    }
                } else {
                    echo json_encode([
                        "message" => "Booking was NOT created, not enough params"
                    ]);
                }
                break;

            case 'PUT':
                include_once (ROOT . '/view/shared/header.php');
                if ($_GET["id"] == $_POST["id"] && isset($_GET["id"])) {
                    if ($isSet) {
                        $booking = $this->updateBooking();
                        if ($booking) {
                            http_response_code(201);
                            echo json_encode([
                                "message" => "Booking " . $_POST['id'] . " was updated",
                                "updated" => $booking
                            ]);
                        } else {
                            echo json_encode([
                                "message" => "Booking " . $_POST['id'] . " was NOT updated",
                                "updated" => $booking
                            ]);
                        }
                    } else {
                        echo json_encode([
                            "message" => "Booking " . $_POST['id'] . " was NOT updated, not enough params"
                        ]);
                    }
                }
                else {
                    echo json_encode([
                        "message" => "Booking " . $_POST['id'] . " was NOT updated, booking id does not match id in query"
                    ]);
                }
                break;
            case 'DELETE':
                include_once (ROOT . '/view/shared/header.php');
                $id = $_GET["id"];
                $deleted = Room::deleteRoom($id);
                if ($deleted) {
                    echo json_encode([
                        "message" => "Room $id was NOT deleted",
                        "deleted" => $deleted
                    ]);
                } else {
                    echo json_encode([
                        "message" => "Room $id was deleted",
                        "deleted" => $deleted
                    ]);
                }
                break;
            default:
                http_response_code(405);
                header("Allow: GET, POST, PUT, DELETE");
                break;
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

    public function updateBooking()
    {
        $id=$_POST["id"];
        $people =$_POST["people"];
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
}