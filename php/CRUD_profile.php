<?php

include "connection_be.php";

$usuario = $_GET['usuario'];
$action = $_POST['action'];

$type = $_POST['qualification'];
$level = $_POST['level'];
$knowledge = $_POST['knowledge'];
$technologies = $_POST['technologies'];

if ($action == 'create'){

}else if ($action == 'mod'){

}else if ($action == 'del'){

}

mysqli_close($conexion);

?>