<?php
function select_user_by_phone($phone)
{
    global $db;
    $query = "SELECT * FROM user WHERE phone='" . $phone . "'";
    $result = mysqli_query($db, $query);
    return $result;
}

function insert_user($name, $email, $surname, $password, $authority_title, $phone)
{
    global $db;
    $query = "INSERT INTO user (phone, name, email, surname, password, authority_title) 
                  VALUES (?, ?, ?, ?,?,?)";
    $stmt = $db->prepare($query);
    if ($stmt)
        $stmt->bind_param("ssssss", $phone, $name, $email, $surname, $password, $authority_title);
    if ($stmt->execute()) {
        if ($stmt->execute()) {
            $count = $stmt->num_rows();
        }
    }
    return $count;
}

function select_all() {
    global $db;
    $query = "SELECT * FROM user";
    $result = mysqli_query($db, $query);
    return $result;
}

function update_user($name, $email, $surname, $password, $authority_title, $phone)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM user WHERE phone = ?;");
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($phone);
    if ($stmt->num_rows === 1) {
        $query = "UPDATE user SET name = ?, email =?, surname= ?,  password= ?,  authority_title= ? WHERE phone= ?;";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssssss', $name, $email, $surname, $password, $authority_title, $phone);
        $db->close();
    }
    if ($stmt->execute()) {
        $count = $stmt->num_rows();
    }
    return $count;
}

function delete_user($phone)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM user WHERE phone = ?;");
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    if ($count === 1) {
        $query = "DELETE FROM user WHERE phone = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $phone);
        if ($stmt->execute()) {
            $count = $stmt->num_rows;
        }
    }
    return $count;
}