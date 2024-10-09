<?php
    /*
        index6.php - Acceder la página con un query param
        (localhost:8000/index4.php?id=1). Conectar a la base de datos de MySQL
        utilizando mysqli. Hacer una consulta para obtener una habitación (con el ID
        de GET) y mostrarla abajo utilizando el código de index4.php
    */
    $mysqli_connection = new mysqli("localhost","root","123456789","hoteldb");
    if($mysqli_connection -> connect_errno){
        echo "Failed Connection: " . $mysqli_connection -> connect_errno;
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
            WHERE
                r.idRoom = " . (isset($_GET['id']) ? $_GET['id'] : "");
    
    if(isset($_GET['id'])){
        $result = $mysqli_connection -> query($query);
        $data = $result -> fetch_assoc();
        if(empty($data['roomNumber'])){
            echo "Room not found";
        }else{
            echo "<h2>Room found</h2>\n";
            foreach($data as $key => $value){
                echo "$key: $value <br>";
            }
        }
    }else{
        echo "ID not specified";
    }
    $mysqli_connection -> close();
?>