<?php
    require_once 'conf_sesion.php';
    require_once 'no_login.php';
    require_once 'inctividad.php';
    if(isset($_SESSION['visitas'])){
        $_SESSION['visitas'] += 1;
    }else{
        $_SESSION['visitas'] = 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contador de visitas</h1>
    <?php
        if($_SESSION['visitas'] == 1){
            echo "Esta es la primera visita";
        }else{
            echo "Visitas realizadas: {$_SESSION['visitas']}";
        }
    ?>
    <p><a href="contador.php">Nueva visita</a></p>
</body>
</html>