<?php

include_once(ROOT . '/admin/model/Payment.php');

class PaymentController
{
    public function processMethod()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                $result = Payment::getPaymentList();
//                echo json_encode($result);
                include_once (ROOT . '/admin/view/payment.php');

                break;
            /*case 'POST':
                
                if (isset($_POST["people"]) && isset($_POST["check_in_date"]) && isset($_POST["check_out_date"]) && isset($_POST["user_id"]) && isset($_POST["room_id"])) {
                    $booking = $this->createBooking();
                    if ($booking) {
                        http_response_code(201);
                        echo json_encode([
                            "message" => "Booking ". $booking->{'id'}. " was created",
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
                
                if ($_GET["id"] == $_POST["id"] && isset($_GET["id"])) {
                    if (isset($_POST["people"]) && isset($_POST["check_in_date"]) && isset($_POST["check_out_date"]) && isset($_POST["user_id"]) && isset($_POST["room_id"])) {
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
                $id = $_GET["id"];
                if ($id) {
                    $rows = Booking::deleteBooking($id);
                } else {
                    echo "error";
                }
                echo json_encode([
                    "message" => "Booking $id was deleted",

                ]);
                break;
            default:
                http_response_code(405);
                header("Allow: GET, POST, PUT, DELETE");
                break;
        }*/
        }
    }

    public function createPayment()
    {
        $people = $_POST["people"];
        $time = strtotime($_POST["check_in_date"]);
        $newformat = date('Y-m-d h:i:s', $time);
        $check_in_date = $newformat;
        $time = strtotime($_POST["check_out_date"]);
        $newformat = date('Y-m-d h:i:s', $time);
        $check_out_date = $newformat;
        $room_id = $_POST["room_id"];
        $user_id = $_POST["user_id"];
        return Booking::createBooking($room_id, $user_id, $check_in_date, $check_out_date, $people);
    }

    public function updatePayment()
    {
        $id = $_POST["id"];
        $people = $_POST["people"];
        $time = strtotime($_POST["check_in_date"]);
        $newformat = date('Y-m-d h:i:s', $time);
        $check_in_date = $newformat;
        $time = strtotime($_POST["check_out_date"]);
        $newformat = date('Y-m-d h:i:s', $time);
        $check_out_date = $newformat;
        $room_id = $_POST["room_id"];
        $user_id = $_POST["user_id"];
        return Booking::updateBooking($id, $room_id, $user_id, $check_in_date, $check_out_date, $people);
    }
}