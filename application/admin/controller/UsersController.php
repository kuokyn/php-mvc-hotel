<?php

include_once(ROOT . '/admin/model/User.php');

class UsersController
{

    public function processMethod()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                if (!isset($_GET["phone"])) {
                    $result = User::getUserList();
                } else {
                    $result = User::getUserByPhone($_GET["phone"]);
                }
                echo json_encode($result);
                break;

            case 'POST':
                
                if ($_POST["action"] == "create" && isset($_POST["phone"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"]) && isset($_POST["email"])) {
                    $user = $this->createUser();
                    if ($user) {
                        http_response_code(201);
                        echo json_encode([
                            "message" => "User with phone ". $_POST['phone'] . " was created",
                            "created" => $user
                        ]);

                    } else {
                        echo json_encode([
                            "message" => "User was NOT created because of database error"
                        ]);
                    }
                } else if ($_POST["action"] == "login" && isset($_POST["phone"]) && isset($_POST["password"])) {
                    $this->loginUser($_POST["phone"],$_POST["password"]);
                }
                else {
                    echo json_encode([
                        "message" => "User was NOT created because not enough parameters"
                    ]);
                }
                break;

            case 'PUT':
                
                if ($_GET["phone"] == $_POST["phone"] && isset($_GET["phone"])) {
                    if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"]) && isset($_POST["email"])) {
                        $user = $this->updateUser();
                        if ($user) {
                            echo json_encode([
                                "message" => "User " . $_GET["phone"] . " was updated",
                                "updated" => $user
                            ]);
                        } else {
                            echo json_encode([
                                "message" => "User " . $_GET["phone"] . " was NOT updated, database error",
                                "updated" => $user
                            ]);
                        }
                    } else {
                        echo json_encode([
                            "message" => "User " . $_GET["phone"] . " was NOT updated, not enough arguments"
                        ]);
                    }
                }
                else {
                    echo json_encode([
                        "message" => "User " . $_POST['phone'] . " was NOT updated, phone in query and body does not match"
                    ]);
                }
                break;
            case 'DELETE':
                $phone = $_GET["phone"];
                $this->deleteUser($phone);
                break;
            default:
                http_response_code(405);
                header("Allow: GET, POST, PUT, DELETE");
                break;
        }
    }

    public function createUser()
    {
        $authority_title = "ROLE_USER";
        $phone = $_POST["phone"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        return User::createUser($name, $email, $surname, $password, $authority_title, $phone);
    }

    public function updateUser()
    {
        $authority_title = "ROLE_USER";
        $phone = $_POST["phone"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        return User::updateUser($name, $email, $surname, $password, $authority_title, $phone);
    }

    public function deleteUser($phone)
    {
        $deleted = null;
        if ($phone) {
            $deleted = User::deleteUser($phone);
        } else {
            echo "error";
        }
        if ($deleted) {
            echo json_encode([
                "message" => "User with phone $phone was NOT deleted"
            ]);
        } else {
            echo json_encode([
                "message" => "User with phone $phone was deleted"
            ]);
        }
    }

    public function loginUser($login, $password) {
        $user = User::getUserByPhone($login);
        if ($user['password']== $password) {
            $_SESSION["loggedIn"] = TRUE;
            $_SESSION["login"] = $login;
            echo json_encode([
                "message" => "You are logged in",
                "session login" => $_SESSION["login"]
            ]);
        } else {
            echo json_encode([
                "message" => "Invalid username or password"
            ]);
        }
    }
}