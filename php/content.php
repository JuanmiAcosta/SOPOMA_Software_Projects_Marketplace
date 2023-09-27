<?php
$usuario = $_GET['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>OSM App</title>
    <meta name="description" content="The main content area." />
    <link rel="shortcut icon" href="../icon/logo.png" />

    <link rel="stylesheet" href="../css/style-main.css" />


</head>

<body style="background-color: #11191f; font-family: 'system-ui', sans-serif;">

        <div id="prueba">
            <h1 style="color:white;">🐧 Welcome,
                <?php echo $usuario; ?> 🐧
            </h1>
        </div>

</body>

</html>