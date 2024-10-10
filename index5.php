<?php
    /*
        index5.php - Conectar a la base de datos de MySQL utilizando mysqli. Hacer
        una consulta para obtener las habitaciones y mostrarlas abajo utilizando el
        código de index3.php
    */
    require 'setup.php';
    require './fetchs/fetchRoomsFromDB.php';

    var_dump(fetchRoomsFromDB());
    echo "<br>";

    echo $blade->run("rooms", ['data' => fetchRoomsFromDB()]);


    /*
    $mysql_connection = new mysqli("localhost","root","123456789","hoteldb");
    if($mysql_connection -> connect_errno){
        echo "Failed Connection: " . $mysql_connection -> connect_errno;
        exit();
    }

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
            GROUP BY
                r.idRoom;";

    echo "List Rooms";
    echo "<ol>";
        $result = $mysql_connection -> query($query);
        while($data = $result -> fetch_assoc()){
            echo "<li>";
                foreach($data as $key => $value){
                    echo "$key: $value <br>";
                }
            echo "</li> <br>";
        }
    echo "</ol>";

    $mysql_connection -> close();*/
?>