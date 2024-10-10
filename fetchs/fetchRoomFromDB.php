<?php
    require './conn/db.php';

    function fetchRoomsFromDB($id){

        global $mysqli_connection;

        $query = "SELECT
                r.idRoom,
                r.roomNumber,
                r.typeRoom,
                r.description,
                r.offer,
                r.price,
                r.discount,
                r.cancellation,
                r.status,
                GROUP_CONCAT(DISTINCT p.uri ORDER BY p.uri SEPARATOR ', ') AS photos,
                GROUP_CONCAT(DISTINCT a.name ORDER BY a.name SEPARATOR ', ') AS amenities
            FROM
                rooms r
            LEFT JOIN
                photosRoom p ON r.idRoom = p.idRoom
            LEFT JOIN
                amenities_rooms ar ON r.idRoom = ar.idRoom
            LEFT JOIN
                amenities a ON ar.idAmenitie = a.idAmenitie
            WHERE
                r.idRoom = " . $id;
                
        $result = $mysqli_connection -> query($query);
        $data = $result -> fetch_assoc();
        //$mysqli_connection -> close();
        return $data;
    }
?>