<?php

include "connection_be.php";

$usuario = $_GET['usuario'];
$action = $_POST['action'];

$type = $_POST['qualification'];
$level = $_POST['level'];
$knowledge = $_POST['knowledge'];
$technologies = $_POST['technologies'];

if ($action == 'create'){
    $sql = "INSERT INTO profiles (type, level, knowledge, technologies, user) VALUES ('$type', '$level', '$knowledge', '$technologies', '$usuario')";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $_SESSION['usuario'] = $usuario;

    echo "
    <script>
        window.location = '../php/user_place.php?usuario=$usuario';              
    </script>
";  

}else if ($action == 'mod'){ //NO FUSCA HAY QUE ARREGLARLO

    $sql = "UPDATE profiles SET ";

    if (!empty($level)) {
        $sql .= "level='$level', ";
    }
    if (!empty($knowledge)) {
        $sql .= "knowledge='$knowledge', ";
    }
    if (!empty($technologies)) {
        $sql .= "technologies='$technologies', ";
    }
    $sql = rtrim($sql, ", "); // Eliminar la última coma y espacio

    $sql .= " WHERE user='$usuario' AND type='$type'";

    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $_SESSION['usuario'] = $usuario;
    echo "
    <script>
        window.location = '../php/user_place.php?usuario=$usuario';
        </script>
        ";

}else if ($action == 'del'){
    $sql = "DELETE FROM profiles WHERE user='$usuario'";
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