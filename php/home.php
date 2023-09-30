<?php
$usuario = $_GET['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SOPOMA App</title>
    <meta name="description" content="The main content area." />
    <link rel="shortcut icon" href="../icon/logo.png" />
    <link rel="stylesheet" href="../css/style-main.css" />


</head>

<body style="font-family: 'system-ui', sans-serif;">

    <header class="header">
        <div class="logo">
            <!-- la que hay que liar para pasar la variable usuario de un lao pa otro -->
            <?php

                echo'<a href="sendhome.php?usuario='.urlencode($usuario).'">
            
                        <img src="../icon/logo.png" alt="logo" />

                    </a>'
            ?>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Profiles</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </nav>
        <a href="#" class="btn"><button>@
                <?php echo $usuario; ?>'s place
            </button></a>
    </header>

    <div class="container">

        <div id="prueba">
            <h1 style="color:white;">🐧 Welcome,
                @
                <?php echo $usuario; ?> 🐧
            </h1>
        </div>

    </div>

</body>

</html>