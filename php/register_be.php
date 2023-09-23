<?php

    include 'connection_be.php'; // Para poder acceder a la base de datos y ejecutar querys

    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $usuario = $_POST['user'];
    $contrasena = $_POST['password'];

    $query = "INSERT INTO users (email, user, name, surname, password, phone) VALUES ('$email', '$usuario', '$nombre', '$apellido', '$contrasena', '$telefono')";

    $ejecutar = mysqli_query($conexion, $query);

?>