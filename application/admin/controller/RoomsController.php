<?php

include_once(ROOT . '/admin/model/Room.php');

class RoomsController
{

    public function processMethod()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                if (!isset($_GET["id"])) {
                    $result = Room::getRoomList();
                }
                else {
                    $result = Room::getRoomById($_GET["id"]);
                }
                echo json_encode($result);
                break;

            case 'POST':
                
                if (isset($_POST["id"]) && isset($_POST["people"]) && isset($_POST["room_type_title"]) && isset($_POST["chambers"])) {
                    $room =  $this->createRoom();
                    if ($room) {
                        echo json_encode([
                            "message" => "Room ". $_POST['id'] . " was created",
                            "created" => $room
                        ]);
                        http_response_code(201);
                    }
                } else {
                    echo json_encode([
                        "message" => "Room ". $_POST['id'] . " was NOT created"
                    ]);
                }
                break;

            case 'PUT':
                
                if (isset($_POST["id"]) && isset($_POST["people"]) && isset($_POST["room_type_title"]) && isset($_POST["chambers"])) {
                    $room = $this->updateRoom();
                    if ($room) {
                        echo json_encode([
                            "message" => "Room ". $_POST['id'] . " was updated",
                            "updated" => $room
                        ]);
                    }  else {
                        echo json_encode([
                            "message" => "Room ". $_POST['id'] . " was NOT updated because id is null",
                            "updated" => $room
                        ]);
                    }
                }  else {
                    echo json_encode([
                        "message" => "Room ". $_POST['id'] . " was NOT updated because not enough arguments"
                    ]);
                }
                break;
            case 'DELETE':
                $id = $_GET["id"];
                $this->deleteRoom($id);
                break;
            default:
                http_response_code(405);
                header("Allow: GET, POST, PUT, DELETE");
                break;
        }
    }

    public function createRoom()
    {
        $id = $_POST["id"];
        $people = $_POST["people"];
        $chambers= $_POST["chambers"];
        $room_type_title = $_POST["room_type_title"];
        return Room::createRoom($id, $chambers, $people, $room_type_title);
    }

    public function updateRoom()
    {
        $id = $_POST["id"];
        $people = $_POST["people"];
        $chambers= $_POST["chambers"];
        $room_type_title = $_POST["room_type_title"];
        return Room::updateRoom($id, $chambers, $people, $room_type_title);
    }

    public function deleteRoom($id) {
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
    }
}