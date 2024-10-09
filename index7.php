<?php
    /*
        index7.php - Utilizar el código de index5.php para mostrar todas las
        habitaciones, pero incluir un formulario (sin method y sin action) para buscar
        también. Utilizar un if para ver si has buscado y hacer una consulta diferente
        para obtener las habitaciones WHERE name LIKE <search>
    */
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

    echo "<form method='GET'>";
    echo "<input type='text' name='search' placeholder='typeRoom'> <input type='submit' value='Search'>";
    echo "</form>";

    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search = $mysql_connection -> real_escape_string($_GET['search']);
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
                    r.typeRoom LIKE '%$search%'
                GROUP BY
                    r.idRoom;";

        $result = $mysql_connection -> query($query);
        $data = $result -> fetch_assoc();
        if(empty($data['typeRoom'])){
            echo "Rooms not founds";
        }else{
            if($result -> num_rows > 1){
                $result -> free();
                $result = $mysql_connection -> query($query);
                while($datas = $result -> fetch_assoc()){
                    foreach($datas as $key => $value){
                        echo "$key: $value <br>";
                    }
                    echo "<br>";
                }
            }else{
                foreach($data as $key => $value){
                    echo "$key: $value <br>";
                }
                echo "<br>";
            }
        }
    }else{
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
    }
    //$mysql_connection -> close();
?>