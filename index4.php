<?php
    /*
        index4.php - Acceder la página con un query param
        (localhost:8000/index4.php?id=1). Leer el parámetro de GET, importar las
        © Oxygen Network España SL
        habitaciones JSON, y buscar dentro del array para ver si hay una habitación
        con el mismo ID. Si hay una, mostrarla con las propiedades Name, Number,
        Price y Discount
    */
    define("JSON_LOCAL","./room.json");
    $json = file_get_contents(JSON_LOCAL);
    $data = json_decode($json,true);
    $keys = array("typeRoom","roomNumber","price","discount");
    $roomFound = null;
    if(isset($_GET['id'])){
        foreach($data as $room){
            if($room['id'] == $_GET['id']){
                $roomFound = $room;
            }
        }
        if($roomFound){
            echo "<h2>Room found</h2>";
            echo "<p>Name: " . $roomFound['typeRoom'] . "</p>";
            echo "<p>Number: " . $roomFound['roomNumber'] . "</p>";
            echo "<p>Price: " . $roomFound['price'] . "</p>";
            echo "<p>Discount: " . $roomFound['discount'] . "</p>";
        }else{
            echo "No Rooms founds";
        }
    }else{
        echo "<h2>No ID provide</h2>";
        echo "<ol>";
            foreach($data as $key => $value){
                    echo "<li>";
                        foreach($value as $key => $value){
                            if(in_array($key,$keys)){
                                echo "$key: $value" . ($key == "discount" ? "" : ".<br>");
                            }
                        }
                    echo "</li>";
                    echo "<br>";
            }
        echo "</ol>";
    }
?>