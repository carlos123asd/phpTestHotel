<?php
    /*
        index10.php - Utilizar el mismo código de index5.php pero en vez de mostrar las habitaciones abajo, utilizar una biblioteca ‘BladeOne’
        Solo hay que copiar un archivo a la carpeta (BladeOne.php), e importarlo
        Crear dos carpetas vacías views/ cache/
        Hacer el setup aqui: https://github.com/EFTEC/BladeOne?tab=readme-ov-file#explicit-definition 
        Crear una plantilla de Blade en views/rooms.blade.php con el código de index3.php pero utilizando la sintaxis de Blade para hacer el bucle (docs: https://laravel.com/docs/11.x/blade#loops)  
        Bonus: Extraer todo el ‘setup’ a un archivo setup.php para dejar el archivo index10.php limpio
        Bonus 2: Meter toda la lógica en todos los archivos en funciones (por ejemplo fetchRoomsFromJSON(), fetchRoomFromDB($id) etc…)
        Bonus 3: Crear una clase para representar una habitación y añadir métodos estáticos para obtenerlas del JSON y de la base de datos
    */
    require 'setup.php';

    //echo $blade->run("rooms", ['name' => 'John Doe']);
?>