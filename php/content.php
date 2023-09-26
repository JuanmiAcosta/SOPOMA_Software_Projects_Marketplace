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
    <link rel="canonical" href="https://picocss.com/examples/sign-in/" />

    <!-- Pico.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />

    <!-- Custom styles for this example -->
    <link rel="stylesheet" href="../css/style-main.css" />


</head>

<body>

    <main class="container">
        <div id="prueba">
            <h1>🐧 Welcome,
                <?php echo $usuario; ?> 🐧
            </h1>
        </div>
    </main>

</body>

</html>