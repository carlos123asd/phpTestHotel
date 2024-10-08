<?php
    /*
     index2.php - Copiar el archivo JSON de las habitaciones ficticios al proyecto
    (rooms.json), importar el archivo en index2.php y muestra el contenido dentro
    de una etiqueta <pre></pre>
    */
    define("JSON_LOCAL","./room.json");
    $json = file_get_contents(JSON_LOCAL);
    $data = json_decode($json,true);
    echo "<pre>";
        //print_r($data);
        foreach($data as $key => $value){
                foreach($value as $key => $value){
                    if(is_array($value)){
                        echo "$key\n";
                        foreach($value as $key => $value){
                            echo "$key: $value\n";
                        }
                    }else{
                        echo "$key: $value\n";
                    }
                }
                echo "\n";
        }
    echo "</pre>";
?>