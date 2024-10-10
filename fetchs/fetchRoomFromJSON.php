<?php
    require './fetchRoomsFromDB.php';

    function fetchRoomFromJSON($id){
        $data = fetchRoomsFromJSON();
        $roomFound = null;
        
        foreach($data as $room){
            if($room['id'] == $id){
                $roomFound = $room;
            }
        }

        return $roomFound;
    }
?>