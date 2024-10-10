<?php
    try {
        $mysqli_connection = new mysqli("localhost","root","123456789","hoteldb");
    } catch (Exception $e) {
        echo "Error conection: " . $e -> getMessage();
        exit();
    }
?>