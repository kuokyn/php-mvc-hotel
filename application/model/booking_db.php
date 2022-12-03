<?php
function select_booking_by_id($id)
{
    global $db;
    $query = "SELECT * FROM booking WHERE id='" . $id . "'";
    $result = mysqli_query($db, $query);
    return $result;
}

function insert_booking($room_id, $user_id, $check_in_date ,$check_out_date, $people)
{
    global $db;
    $query = "INSERT INTO booking (room_id, user_id, check_in_date ,check_out_date, people) 
                  VALUES (?, ?, ?, ?,?,?)";
    $stmt = $db->prepare($query);
    if ($stmt)
        $stmt->bind_param('isssi', $room_id, $user_id, $check_in_date ,$check_out_date, $people);
    if ($stmt->execute()) {
        if ($stmt->execute()) {
            $count = $stmt->num_rows();
        }
    }
    return $count;
}

function select_all_bookings() {
    global $db;
    $query = "SELECT * FROM booking";
    $result = mysqli_query($db, $query);
    return $result;
}

function update_booking($id,$room_id, $user_id, $check_in_date ,$check_out_date, $people)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM booking WHERE id = ?;");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    if ($stmt->num_rows === 1) {
        $query = "UPDATE booking SET room_id = ?, user_id=?, check_in_date=?, check_out_date=?, people =? WHERE id= ?;";
        $stmt = $db->prepare($query);
        $stmt->bind_param('iisssi', $id,$room_id, $user_id, $check_in_date ,$check_out_date, $people);
        $db->close();
    }
    if ($stmt->execute()) {
        $count = $stmt->num_rows();
    }
    return $count;
}

function delete_booking($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM booking WHERE id = ?;");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    if ($count === 1) {
        $query = "DELETE FROM booking WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            $count = $stmt->num_rows;
        }
    }
    return $count;
}