<?php
    $db = new mysqli("mysql", "root", "root", "hotel_db");
    if ($db === false) {
        $error = mysqli_connect_error();
        include('../view/error.php');
    }
?>