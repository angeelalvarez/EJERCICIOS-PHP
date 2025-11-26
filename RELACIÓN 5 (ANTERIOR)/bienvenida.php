<?php
    require_once 'conf_sesion.php';
    require_once 'no_login.php';
    require_once 'inctividad.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a la página principal <?php echo $_SESSION['user']?></h1>
       <p><a href="contador.php">Contador de visitas</a></p>
       <p><a href="dado.php">Dado</a></p>
       <p><a href="salir.php">Cerrar sesión</a></p>

</body>
</html>