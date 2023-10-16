<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
            <script>
                alert("You must login first");      
                window.location = "../index.php";      
            </script>
        ';
    session_destroy();
    die();
} else {
    $usuario = $_SESSION['usuario'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SOPOMA App</title>
    <meta name="description" content="The main content area." />
    <link rel="shortcut icon" href="../icon/logo.png" />
    <link rel="stylesheet" href="../css/style-user_place.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body style="font-family: 'system-ui', sans-serif;">

    <header class="header">

        <div class="logo">
            <!-- la que hay que liar para pasar la variable usuario de un lao pa otro -->
            <?php

            echo '<a href="sendpg.php?usuario=' . urlencode($usuario) . '&pg=home">
            
                        <img src="../icon/logo.png" alt="logo" />

                    </a>'
                ?>
        </div>

        <nav>
            <input type="checkbox" id="check" />

            <label for="check" class="checkbtn">
                <i id="barras" class="fas fa-bars"></i>
            </label>

            <ul class="nav-links">

                <li>
                    <?php
                    echo '<a href="sendpg.php?usuario=' . urlencode($usuario) . '&pg=home">
                        Home
                    </a>';
                    ?>
                </li>

                <li>
                    <?php
                    echo '<a href="sendpg.php?usuario=' . urlencode($usuario) . '&pg=projects">
                        Projects
                    </a>' ?>
                </li>

                <li>
                    <?php
                    echo '<a href="sendpg.php?usuario=' . urlencode($usuario) . '&pg=profiles">
                        Profiles
                    </a>' ?>
                </li>

                <li>
                    <?php
                    echo '<a href="sendpg.php?usuario=' . urlencode($usuario) . '&pg=ratings">
                        Ratings
                    </a>' ?>
                </li>

                <li>
                    <?php
                    echo '<a href="sendpg.php?usuario=' . urlencode($usuario) . '&pg=user_place" class="btn">
                        <button>@' . $usuario . '\'s place</button>
                        </a>';
                    ?>
                </li>

                <li><a id="close" href="../php/close_session.php"><svg id="puerta" xmlns="http://www.w3.org/2000/svg"
                            height="1em" viewBox="0 0 576 512">
                            <style>
                                svg {
                                    fill: #ffffff
                                }
                            </style>
                            <path
                                d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z" />
                        </svg>
                    </a>
                </li>

            </ul>
        </nav>
    </header>

    <main class="container">

        <h1 id="title_users">@
            <?php echo $usuario; ?>'s user and profiles info
        </h1>

        <div id="CRUD_user">

            <div id="modificate_user">

                <h2>Modificate user info</h2>

                <form action="CRUD_user.php?usuario=<?php echo urlencode($usuario); ?>" method="POST" onsubmit="return mod_user()">

                    <label for="modificate_phone">New phone:</label>
                    <input type="number" class="phone" id="modificate_phone" name="phone">

                    <label for="modificate_phone">New name:</label>
                    <input type="text" class="name" id="modificate_name" name="name">

                    <label for="modificate_phone">New surname:</label>
                    <input type="text" class="surname" id="modificate_surname" name="surname">

                    <button id="modificate_user_btn"><i class="fa-solid fa-arrows-spin"></i></button>

                </form>

            </div>

            <div id="delete_user">

                <h2>Delete user</h2>

                <?php
                include "connection_be.php";

                // Consulta SQL para obtener los datos del usuario
                $query = "SELECT * FROM users WHERE user = '$usuario'";
                $result = mysqli_query($conexion, $query);

                // Imprimir los datos del usuario
                while ($row = $result->fetch_assoc()) {
                    $nombre = $row["name"];
                    $apellido = $row["surname"];
                    $email = $row["email"];
                    $telefono = $row["phone"];
                }

                mysqli_close($conexion)

                    ?>

                <table>
                    <tr>
                        <th>Nombre</th>
                        <td>
                            <?php echo $nombre; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td>
                            <?php echo $apellido; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <?php echo $email; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>
                            <?php echo $telefono; ?>
                        </td>
                    <tr>
                        <th>Usuario</th>
                        <td id="user_name">
                            <?php echo $usuario; ?>
                        </td>
                    </tr>
                </table>

                <button id="delete_user_btn"><i class="fa-solid fa-trash"></i></button>

            </div>

        </div>

        <div id="CRUD_profiles">

            <div id="create_profile">

                <h2>Create profile</h2>

                <label for="create_qualification">Qualification:</label>
                <select class="qualification" id="create_qualification" name="create_qualification">
                    <?php
                    include "connection_be.php";

                    // Consulta SQL para obtener las opciones de la tabla "qualifications"
                    $sql = "SELECT * FROM Qualifications";
                    $result = mysqli_query($conexion, $sql);

                    // Imprimir las opciones en la lista desplegable
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["qualification"] . "'>" . $row["qualification"] . "</option>";

                    }

                    mysqli_close($conexion);
                    ?>
                </select>

                <label for="create_level">Level:</label>
                <select class="level" id="create_level" name="create_level">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>

                <label for="create_knowledge">Knowledge:</label>
                <input type="text" class="knowledge" id="create_knowledge" name="create_knowledge">

                <label for="create_technologies">Technologies:</label>
                <input type="text" class="technologies" id="create_technologies" name="create_technologies">

                <button id="create_profile_btn"><i class="fa-regular fa-square-plus"></i></button>

            </div>

            <div id="modificate_profile">

                <h2>Modificate profile</h2>

                <label for="modificate_qualification">Qualification:</label>
                <select class="qualification" id="modificate_qualification" name="modificate_qualification">
                    <?php
                    include "connection_be.php";

                    // Consulta SQL para obtener las opciones de la tabla "qualifications"
                    $sql = "SELECT Qualifications.qualification
                    FROM Qualifications
                    INNER JOIN profiles ON Qualifications.qualification = profiles.type
                    WHERE profiles.user = '$usuario'";
                    $result = mysqli_query($conexion, $sql);

                    // Imprimir las opciones en la lista desplegable
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["qualification"] . "'>" . $row["qualification"] . "</option>";

                    }

                    mysqli_close($conexion);
                    ?>
                </select>

                <label for="modificate_level">Level:</label>
                <select class="level" id="modificate_level" name="modificate_level">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>

                <label for="modificate_knowledge">Knowledge:</label>
                <input type="text" class="knowledge" id="modificate_knowledge" name="modificate_knowledge">

                <label for="modificate_technologies">Technologies:</label>
                <input type="text" class="technologies" id="modificate_technologies" name="modificate_technologies">

                <button id="modificate_profile_btn"><i class="fa-solid fa-arrows-spin"></i></button>

            </div>

            <div id="delete_profile">

                <h2>Delete profile</h2>

                <label for="delete_qualification">Qualification:</label>
                <select class="qualification" id="delete_qualification" name="delete_qualification">
                    <?php
                    include "connection_be.php";

                    // Consulta SQL para obtener las opciones de la tabla "qualifications"
                    $sql = "SELECT Qualifications.qualification FROM Qualifications 
                    INNER JOIN profiles ON Qualifications.qualification = profiles.type 
                    WHERE profiles.user = '$usuario'";

                    $result = mysqli_query($conexion, $sql);

                    // Imprimir las opciones en la lista desplegable
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["qualification"] . "'>" . $row["qualification"] . "</option>";

                    }

                    mysqli_close($conexion);
                    ?>
                </select>

                <button id="delete_profile_btn"><i class="fa-solid fa-trash"></i></button>

            </div>

            <!--
                <div id="CRUD_projects_teams"></div>
                <div id="CRUD_ratings"></div>
            -->

            <div class="espacio_al_final"></div>
        </div>

    </main>

    <script src="../js/CRUD_user.js"></script>
    <script src="../js/bars-cross.js"></script>

</body>

</html>