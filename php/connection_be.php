<?php

    // Una Conexión -> Patrón de diseño Singleton
    $conexion = new mysqli("localhost","root","","sopoma_bd");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    /*
    if ($conexion) {
        echo 'Conectado exitosamente a la base de datos';
    } else {
        echo 'No se ha podido conectar a la base de datos';
    }
    */  
    
?>