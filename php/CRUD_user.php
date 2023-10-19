<?php

include "connection_be.php";

$usuario = $_GET['usuario'];

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];

$action = $_POST['action'];

if ($action == 'mod') {
    // Construir la consulta SQL
    $sql = "UPDATE users SET ";
    if (!empty($name)) {
        $sql .= "name='$name', ";
    }
    if (!empty($surname)) {
        $sql .= "surname='$surname', ";
    }
    if (!empty($phone)) {
        $sql .= "phone='$phone', ";
    }
    $sql = rtrim($sql, ", "); // Eliminar la última coma y espacio

    $sql .= " WHERE user='$usuario'";

    echo "<script>alert(sql = $sql)</script>";

    $stmt = $conexion->prepare($sql);

    $stmt->execute();

    $_SESSION['usuario'] = $usuario;

    echo 'Los datos del usuario ' . $user . ' han sido actualizados correctamente.';

    echo "
    <script>
        window.location = '../php/user_place.php?usuario=$usuario';              
    </script>
";
} else if ($action == 'del') {

    //INCOMPLETO, PRIMERO HABRÍA QUE BORRAR TODO LOS RELACIONADO CON EL USUARIO

    // Construir la consulta SQL
    $sql = "DELETE FROM users WHERE user='$usuario'";

    $stmt = $conexion->prepare($sql);

    $stmt->execute();

    echo "
    <script>
        window.location = '../index.php';              
    </script>
    ";
}

mysqli_close($conexion);

?>