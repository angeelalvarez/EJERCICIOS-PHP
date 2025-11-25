<?php
    require_once 'config_sesion.php';
    require_once 'no_logueado.php';
    require_once 'inactividad.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?= $_SESSION['user'] ?>. Archivos de la batcueva cargados</h1>
    <p><a href="sesiones1.php">Buscar pista</a></p>
    <p><a href="batmovil.php">Equipar Batmóvil</a></p>
    <p><a href="salir.php">Salir de la batcueva</a></p>
</body>
</html>