<?php
    /*
        Utilizar el mismo código de index8.php pero esta vez guardar la habitación nueva en la base de datos de MySQL. 
        Se puede confirmar visitando index5.php
    */
    $sql_connection = new mysqli("localhost","root","123456789","hoteldb");

    if($sql_connection -> connect_errno){
        echo $sql_connection -> connect_errno;
        exit();
    }

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

        $roomNumber = isset($_POST['roomNumber']) ? $sql_connection->real_escape_string($_POST['roomNumber']) : 0;
        $typeRoom = isset($_POST['typeRoom']) ? $sql_connection->real_escape_string($_POST['typeRoom']) : '';
        $description = isset($_POST['description']) ? $sql_connection->real_escape_string($_POST['description']) : '';
        $offer = (isset($_POST['discount']) && (int)$_POST['discount'] > 0) ? 1 : 0;
        $price = isset($_POST['price']) ? $sql_connection->real_escape_string($_POST['price']) : '0';
        $discount = isset($_POST['discount']) ? $sql_connection->real_escape_string($_POST['discount']) : 0;
        $cancellation = isset($_POST['cancellation']) ? $sql_connection->real_escape_string($_POST['cancellation']) : '';
        $status = isset($_POST['status']) ? $sql_connection->real_escape_string($_POST['status']) : '';

        $query = $sql_connection -> prepare("INSERT INTO rooms(roomNumber,typeRoom,description,offer,price,discount,cancellation,status) values(?,?,?,?,?,?,?,?)");
        $query -> bind_param("issisiss",
            $roomNumber,
            $typeRoom,
            $description,
            $offer,
            $price,
            $discount,
            $cancellation,
            $status
        );

        try{
            $query -> execute();
            echo "<h1>Room List, loading...</h1>";
            sleep(3);
            header("location: index5.php");
            exit();
        }catch(Exception $e){
            echo 'Error creating a new room: ' . $e -> getMessage();
        }
    }
?>