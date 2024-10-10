<?php
    function fetchRoomsFromJSON(){
        define("JSON_LOCAL",realpath(__DIR__ . '/../room.json'));
        $json = file_get_contents(JSON_LOCAL);
        $data = json_decode($json,true);
        return $data;
    }
?>