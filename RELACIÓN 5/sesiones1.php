<?php
    require_once 'config_sesion.php';
    require_once 'no_logueado.php';
    require_once 'inactividad.php';
    if(isset($_SESSION['num_pistas'])){
        $_SESSION['num_pistas'] += 1;
    }else{
        $_SESSION['num_pistas'] = 1;
    }

    //$_SESSION['num_pistas'] = ($_SESSION['num_pistas'] ?? 0) + 1;         Sirve igual que el if de arriba


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Búsqueda de pistas</title>
</head>
<body>
    <?php
    if($_SESSION['num_pistas'] == 1){
        echo "<p>Bienvenido, detective has encontrado tu primera pista</p>";
    }else{
        echo "<p>Sigues investigando, has encontrado {$_SESSION['num_pistas']} pistas</p>";
    }
    ?>
    
    
    <p><a href="sesiones1.php">Encontrar pistas</a></p>
</body>
</html>