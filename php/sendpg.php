<?php
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    $pg = $_GET['pg'];

    if ($pg == 'home'){
        echo "
        <script>
            window.location = '../php/home.php?usuario=$usuario';              
        </script>
    ";
    }else if( $pg == 'profiles'){
        echo "
        <script>
            window.location = '../php/profiles.php?usuario=$usuario';              
        </script>
    ";

    } else if ($pg == 'projects'){
        echo "
        <script>
            window.location = '../php/projects.php?usuario=$usuario';              
        </script>
    ";
    } else if ($pg == 'settings'){
        echo "
        <script>
            window.location = '../php/settings.php?usuario=$usuario';              
        </script>
    ";
    } else if ($pg == 'user_place'){
        echo "
        <script>
            window.location = '../php/user_place.php?usuario=$usuario';              
        </script>
    ";
    } else {
        echo "
        <script>
            window.location = '../php/home.php?usuario=$usuario';              
        </script>
    ";
    }
} else {
    echo "No se ha proporcionado ninguna acción.";
}
?>