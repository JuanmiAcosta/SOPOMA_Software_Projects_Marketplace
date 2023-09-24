<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include 'connection_be.php'; // Para poder acceder a la base de datos y ejecutar querys

    $nombre = $_POST['name'];
    $apellido = $_POST['surname'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $usuario = $_POST['user'];
    $contrasena = $_POST['password'];

    // Verificamos que el correo y usuario no sean repetidos

    $sql = "SELECT COUNT(*) as count FROM users WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $sql2 = "SELECT COUNT(*) as count FROM users WHERE user = ?";
    $stmt2 = $conexion->prepare($sql2);
    $stmt2->bind_param("s", $usuario);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();

    if ($row['count'] > 0 ) {
        echo '
            <script>
                alert("The email is already registered"); 
                window.location = "../index.php";            
            </script>
        ';
    }else if ($row2['count'] > 0){
        echo '
            <script>
                alert("The user is already registered");      
                window.location = "../index.php";      
            </script>
        ';
    }else{

        $query = "INSERT INTO users (email, user, name, surname, password, phone) VALUES ('$email', '$usuario', '$nombre', '$apellido', '$contrasena', '$telefono')";

        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
                <script>
                    alert("Register completed successfully. Sign in to continue");
                    window.location = "../index.php";              
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Register failed. Must be another user with that email or username");
                    window.location = "../index.php";
                </script>
            ';
        }
    }

    mysqli_close($conexion);
?>