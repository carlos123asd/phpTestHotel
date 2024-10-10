<?php
    /*
        index8.php - Mostrar un formulario (method=”POST” y sin action) para crear
        una nueva habitación. Si accedes a la página con una peticion POST,
        mostrar la habitación nueva con el código de index4.php
    */

    define("JSON_LOCAL","./room.json");

    echo "<h2>New Room</h2>";
    echo "<form method='POST'>";
    echo "<label for='roomNumber'>Room Number: </label>";
    echo "<br>";
    echo "<input name='roomNumber' type='text' id='roomNumber' placeholder='roomNumber'>";
    echo "<br>";
    echo "<br>";
    echo "<label for='typeRoom'>Type Room: </label>";
    echo "<br>";
    echo "<select name='typeRoom' id='typeRoom'>";
    echo "<option value='Double Superior'>Double Superior</option>";
    echo "<option value='Suite'>Suite</option>";
    echo "<option value='Double Bed'>Double Bed</option>";
    echo "<option value='Single Bed'>Single Bed</option>";
    echo "</select>";
    echo "<br>";
    echo "<br>";
    echo "<label for='description'>Description: </label>";
    echo "<br>";
    echo "<textarea name='description' id='description' placeholder='description'></textarea>";
    echo "<br>";
    echo "<br>";
    echo "<label for='price'>Price: </label>";
    echo "<br>";
    echo "<input name='price' type='text' id='price' placeholder='price'>";
    echo "<br>";
    echo "<br>";
    echo "<label for='discount'>Discount: </label>";
    echo "<br>";
    echo "<input name='discount' type='text' id='discount' placeholder='discount'>";
    echo "<br>";
    echo "<br>";
    echo "<label for='cancellation'>Cancellation: </label>";
    echo "<br>";
    echo "<textarea name='cancellation' id='cancellation' placeholder='cancellation'></textarea>";
    echo "<br>";
    echo "<br>";
    echo "<label for='status'>Status: </label>";
    echo "<br>";
    echo "<select name='status' id='status'>";
    echo "<option value='Booked'>Booked</option>";
    echo "<option value='Available'>Available</option>";
    echo "</select>";
    echo "<br>";
    echo "<br>";
    echo "<input type='submit' value='save'>";
    echo "</form>";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $roomNumber = isset($_POST['roomNumber']) ? (int)($_POST['roomNumber']) : 0;
        $typeRoom = isset($_POST['typeRoom']) ? ($_POST['typeRoom']) : '';
        $description = isset($_POST['description']) ? ($_POST['description']) : '';
        $offer = (isset($_POST['discount']) && (int)$_POST['discount'] > 0) ? true : false;
        $price = isset($_POST['price']) ? ($_POST['price']) : '0';
        $discount = isset($_POST['discount']) ? (int)($_POST['discount']) : 0;
        $cancellation = isset($_POST['cancellation']) ? ($_POST['cancellation']) : '';
        $status = isset($_POST['status']) ? ($_POST['status']) : '';

       
        $file = file_get_contents(JSON_LOCAL);
        $data = json_decode($file,true);
         //Conseguimos los ids y los ordenamos para luego sumar y setear el nuevo id en el json
        $ids = array();
        foreach($data as $room){
            array_push($ids,$room['id']);
        }
        rsort($ids);

        $object = array(
            "id" => $ids[0] + 1,
            "roomNumber" => $roomNumber,
            "photo" => array(
                "https://images.unsplash.com/photo-1572177215152-32f247303126?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w2Mjk0NzV8MHwxfHNlYXJjaHwxNnx8cm9vbSUyMGhvdGVsfGVufDB8fHx8MTcyMjU0NDk5MHww&ixlib=rb-4.0.3&q=80&w=1080",
                "https://images.unsplash.com/photo-1568495248636-6432b97bd949?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w2Mjk0NzV8MHwxfHNlYXJjaHw5fHxyb29tJTIwaG90ZWx8ZW58MHx8fHwxNzIyNTQ0OTkwfDA&ixlib=rb-4.0.3&q=80&w=1080",
                "https://images.unsplash.com/photo-1596194815712-2975c42363a9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w2Mjk0NzV8MHwxfHNlYXJjaHw2MHx8cm9vbSUyMGhvdGVsfGVufDB8fHx8MTcyMjU0NTEyOHww&ixlib=rb-4.0.3&q=80&w=1080"
            ),
            "typeRoom" => $typeRoom,
            "description" => $description,
            "offer" => $offer,
            "price" => $price,
            "discount" => $discount,
            "cancellation" => $cancellation,
            "status" => $status,
            "amenities" => array(
                        "AC",
                        "Shower",
                        "Towel",
                        "Bathup",
                        "Coffee Set",
                        "LED TV",
                        "Wifi"
                    )
        );

        array_push($data,$object);
        $data = json_encode($data,JSON_PRETTY_PRINT);
        
        try{
            file_put_contents(JSON_LOCAL,$data);
            echo "<h1>Room List, loading...</h1>";
            sleep(3);
            header("location: index4.php");
            exit();
        }catch(Exception $e){
            echo 'Error creating a new room(JSON): ' . $e -> getMessage();
        }
    }
?>