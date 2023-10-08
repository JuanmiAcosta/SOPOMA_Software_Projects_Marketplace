<?php
include 'connection_be.php';

$name = $_GET['name'];

$sql = "SELECT user FROM users WHERE name LIKE '%$name%' OR surname LIKE '%$name%' LIMIT 10";
$result = mysqli_query($conexion, $sql);

$users = array();
$num_rows = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
    array_push($users, $row['user']);
}

$info_global = array();

for ($i = 0; $i < $num_rows; $i++) {
    $user = $users[$i];
    $sql2 = "SELECT user,email,name,surname,phone FROM users WHERE user = '$user'";
    $result = mysqli_query($conexion, $sql2);
    $info_user = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $info_user = array(
            'user' => $row['user'],
            'email' => $row['email'],
            'name' => $row['name'],
            'surname' => $row['surname'],
            'phone' => $row['phone'],
            'data_type' => 'User'
        );
    }

    $sql3 = "SELECT * FROM profiles WHERE user = '$user'";
    $result = mysqli_query($conexion, $sql3);
    $num_profiles = mysqli_num_rows($result);
    $profiles = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($profiles, $row['type']);
    }

    $info_profiles = array();

    for ($j = 0; $j < $num_profiles; $j++) {
        $profile = $profiles[$j];
        $sql4 = "SELECT * FROM profiles WHERE user = '$user' AND type = '$profile' LIMIT 3";
        $result = mysqli_query($conexion, $sql4);
        $info_profile = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $info_profile = array(
                'type' => $row['type'],
                'level' => $row['level'],
                'knowledge' => $row['knowledge'],
                'technologies' => $row['technologies'],
                'data_type' => 'Profile'
            );
        }
        
        $info_profiles[$j] = $info_profile;
    }

    $info_user['profiles'] = $info_profiles;
    $info_global[$i] = $info_user;
}

header('Content-Type: application/json');
echo json_encode($info_global);

mysqli_close($conexion);
?>