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
    }else{
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
    <link rel="stylesheet" href="../css/style-home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body style="font-family: 'system-ui', sans-serif;">

    <header class="header">

        <div class="logo">
            <!-- la que hay que liar para pasar la variable usuario de un lao pa otro -->
            <?php

            echo '<a href="sendhome.php?usuario=' . urlencode($usuario) . '">
            
                        <img src="../icon/logo.png" alt="logo" />

                    </a>'
                ?>
        </div>

        <nav>
            <input type="checkbox" id="check" />

            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Profiles</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#" class="btn">
                        <button>@
                            <?php echo $usuario; ?>'s place
                        </button>
                    </a>
                </li>
                <!-- poner icono sign out --> 
                <li><a href="../php/close_session.php">Close session</a></li>
            </ul>
        </nav>



    </header>

    <div class="container">

        <div id="prueba">
            <h1 style="color:white;">🐧 Welcome,
                <?php echo "@$usuario" ?> 
            </h1>
        </div>

    </div>
  </script>

</body>

</html>