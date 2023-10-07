<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'connection_be.php'; // Para poder acceder a la base de datos y ejecutar querys

// Obtener el valor de la variable 'usuario' de la URL

$name = $_GET['name'];

// Obtengo usuarios que tengan el nombre o apellidos parecido

$sql = "SELECT user FROM users WHERE name LIKE '%$name%' OR surname LIKE '%$name%'";

// Ejecutar la query

$result = mysqli_query($conexion, $sql);

// Obtener los "user" de la consulta y guardarlos en un array

$users = array();

//Obtener la cuenta de filas de un resultado

$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
    array_push($users, $row['user']);
}

$info_global = array();

// Iterar por el array de usuarios

for ($i = 0; $i < $num_rows; $i++) {

    // Obtener el usuario

    $user = $users[$i];

    // Obtener el nombre y apellidos del usuario

    $sql2 = "SELECT user,email,name,surname,phone FROM users WHERE user = '$user'";

    // Ejecutar la query

    $result = mysqli_query($conexion, $sql2);

    // Obtener los "name" y "surname" de la consulta y guardarlos en un array

    $info_user = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($info_user, $row['user']);
        array_push($info_user, $row['email']);
        array_push($info_user, $row['name']);
        array_push($info_user, $row['surname']);
        array_push($info_user, $row['phone']);
    }

    // Obtener los perfiles de ese usuario

    $sql3 = "SELECT * FROM profiles WHERE user = '$user'";

    // Ejecutar la query

    $result = mysqli_query($conexion, $sql3);

    // Obtener el número de perfiles

    $num_profiles = mysqli_num_rows($result);

    $profiles = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($profiles, $row['type']);
    }

    $info_profiles = array();

    for ($j = 0; $j < $num_profiles; $j++) {

        $profile = $profiles[$j];

        $sql4 = "SELECT * FROM profiles WHERE user = '$user' AND type = '$profile'";

        $result = mysqli_query($conexion, $sql4);

        $info_profile = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($info_profile, $row['type']);
            array_push($info_profile, $row['level']);
            array_push($info_profile, $row['knowledge']);
            array_push($info_profile, $row['technologies']);
        }

        $info_profiles[$j] = $info_profile;
    }

    array_push($info_user, $info_profiles);
    $info_global[$i] = $info_user;
}

// Codificar el array en formato JSON
header('Content-Type: application/json');
$json_string = json_encode($info_global);

// Devolver el JSON

echo $json_string;

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>