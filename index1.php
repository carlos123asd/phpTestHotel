<?php
/*index1.php - Crear un array en PHP conteniendo 3 habitaciones (cada una es
un array asociativo). Cada habitación tiene 5 propiedades: ID, Name,
Number, Price, Discount. Muestra el array entero dentro de una etiqueta
<pre></pre>*/
$rooms = array(
    array(
        "ID"        =>  1,
        "Name"      =>  "Deluxe Suite",
        "Number"    =>  3000,
        "Price"     =>  300,
        "Discount"  =>  0
    ),
    array(
        "ID"        =>  2,
        "Name"      =>  "Room Double Bed",
        "Number"    =>  1520,
        "Price"     =>  150,
        "Discount"  =>  10
    ),
    array(
        "ID"        =>  3,
        "Name"      =>  "Room Superior",
        "Number"    =>  2350,
        "Price"     =>  250,
        "Discount"  =>  0
    )
);
echo '<pre>';
foreach ($rooms as $key => $value){
    echo "\n";
    if(is_array($value)){
        foreach($value as $key => $value){
            echo "$key: $value\n";
        }
    }else{
        echo "$key: $value\n";
    }
};
echo '</pre>';
//print_r -> Para ver el contenido del array de forma rapida y sencilla
/*echo '<pre>';
    print_r($rooms);
echo'</pre>';*/

//var_dump -> Para ver informacion mas precisas como el tipo y la longitud de los valores
/*echo '<pre>';
    var_dump($rooms);
echo '</pre>';*/
?>