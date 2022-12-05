<?php
function select_room_by_id($id)
{
    global $db;
    $query = "SELECT * FROM room WHERE id='" . $id . "'";
    $result = mysqli_query($db, $query);
    return $result;
}

function insert_room($id, $chambers, $people, $room_type_title)
{
    global $db;
    $query = "INSERT INTO room (id, chambers, people, room_type_title) 
                  VALUES (?, ?, ?, ?,?,?)";
    $stmt = $db->prepare($query);
    if ($stmt)
        $stmt->bind_param("iiis", $id, $chambers, $people, $room_type_title);
    if ($stmt->execute()) {
        if ($stmt->execute()) {
            $count = $stmt->num_rows();
        }
    }
    return $count;
}

function select_all_rooms() {
    global $db;
    $query = "SELECT * FROM room";
    $result = mysqli_query($db, $query);
    return $result;
}

function update_room($id, $chambers, $people, $room_type_title)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM room WHERE id = ?;");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    if ($stmt->num_rows === 1) {
        $query = "UPDATE room SET chambers = ?, people =?, room_type_title= ? WHERE id= ?;";
        $stmt = $db->prepare($query);
        $stmt->bind_param('iiis', $id, $chambers, $people, $room_type_title);
        $db->close();
    }
    if ($stmt->execute()) {
        $count = $stmt->num_rows();
    }
    return $count;
}

function delete_room($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM room WHERE id = ?;");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    if ($count === 1) {
        $query = "DELETE FROM room WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            $count = $stmt->num_rows;
        }
    }
    return $count;
}