<?php
    /*
        index3.php - Utilizar el mismo código para importar el archivo JSON pero
        esta vez pon una etiqueta <ol></ol> y mostrar cada habitación como un
        <li></li> utilizando un bucle de PHP. Mostrar las propiedades Name, Number,
        Price y Discount
    */
    require 'setup.php';
    require './fetchs/fetchRoomsFromJSON.php';
    //print_r(fetchRoomsFromJSON());
    echo $blade->run("rooms", ['data' => fetchRoomsFromJSON()]);

    /*
    define("JSON_LOCAL","./room.json");
    $json = file_get_contents(JSON_LOCAL);
    $data = json_decode($json,true);
    $keys = array("typeRoom","roomNumber","price","discount");
    echo "<ol>";
        foreach($data as $key => $value){
                echo "<li>";
                    foreach($value as $key => $value){
                        if(in_array($key,$keys)){
                            echo "$key: $value" . ($key == "discount" ? "" : ",\r");
                            echo "<br>";
                        }
                    }
                echo "</li>";
                echo "<br>";
        }
    echo "</ol>";
    */
?>

