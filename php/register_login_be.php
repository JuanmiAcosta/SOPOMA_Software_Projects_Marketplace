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

    //ESTO ES UN POCO CHAPUZA PORQUE SOKLO HAY UN FORMULARIO PARA LOGIN Y REGISTER
    //POR LO QUE SI NO SE RELLENAN LOS CAMPOS DE REGISTER ES PORQUE ES UN LOGIN

    if (empty($nombre) && empty($apellido) && empty($email) && empty($telefono)) { //ES PORQUE ES UN LOGIN

        $usuario = $_POST['user'];
        $contrasena = $_POST['password'];

        $sql = "SELECT COUNT(*) as count FROM users WHERE user = ? AND password = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] > 0 ) {
            echo "
                <script>
                    alert('Login completed successfully');
                    window.location = '../php/content.php?usuario=$usuario';              
                </script>
            ";
        }else{
            echo '
                <script>
                    alert("Login failed. Check your username and password being user: '.$usuario.' and password: '.$contrasena.'");
                    window.location = "../index.php";              
                </script>
            ';
        }
    }else{ //ES PORQUE ES UN REGISTER

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
                        alert("Register failed. Try again later (Technical error)");
                        window.location = "../index.php";
                    </script>
                ';
            }
        }
    }

    mysqli_close($conexion);
?>