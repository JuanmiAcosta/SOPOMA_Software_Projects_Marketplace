<?php

include "connection_be.php";

$usuario = $_GET['usuario'];

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];

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

mysqli_close($conexion);

?>