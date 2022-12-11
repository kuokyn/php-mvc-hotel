<?php

class Booking
{
    static function getBookingById($id)
    {
        global $db;
        $query = "SELECT * FROM booking WHERE id='" . $id . "'";
        $result = mysqli_query($db, $query);
        return $result->fetch_array();
    }

    static function createBooking($room_id, $user_id, $check_in_date, $check_out_date, $people)
    {
        global $db;
        $query = "INSERT INTO booking (room_id, user_id, check_in_date ,check_out_date, people) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        if ($stmt) {
            $stmt->bind_param('iissi', $room_id, $user_id, $check_in_date, $check_out_date, $people);
        }
        if ($stmt->execute()) {
            $count = $stmt->num_rows;
        } else {
            printf("Error2: %s.\n", mysqli_stmt_error($stmt));
        }
        return $count;
    }

    static function getBookingList()
    {
        global $db;
        $query = "SELECT * FROM booking";
        $result = mysqli_query($db, $query);
        $i = 0;
        return $result;
    }

    static function updateBooking($id, $room_id, $user_id, $check_in_date, $check_out_date, $people)
    {
        global $db;
        $query = "UPDATE booking SET room_id = ?, user_id=?, check_in_date=?, check_out_date=?, people =? WHERE id= ?";
        $stmt = $db->prepare($query);
        if ($stmt) {
            $stmt->bind_param('iissii', $room_id, $user_id, $check_in_date, $check_out_date, $people, $id);

        } else {
            printf("Error2: %s.\n", mysqli_stmt_error($stmt));
        }
        if ($stmt->execute()) {
            $count = $stmt->num_rows;
        } else {
            printf("Error2: %s.\n", mysqli_stmt_error($stmt));
        }
        return $count;
    }

    static function deleteBooking($id)
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
}
