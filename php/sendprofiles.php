<?php
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    echo "
        <script>
            window.location = '../php/profiles.php?usuario=$usuario';              
        </script>
    ";

} else {
    echo "No se ha proporcionado ninguna acción.";
}
?>