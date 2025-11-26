<?php
    require_once 'conf_sesion.php';
    require_once 'no_login.php';
    $dado = rand(1,6);
    
    if(!isset($_SESSION['tiradas'])){
        $_SESSION['tiradas'] = 0;
        $_SESSION['sum'] = 0;
    }
    
    if(isset($_SESSION['ut'])){
        if($dado > $_SESSION['ut']){
        echo "La tirada actual es mas grande que la anterior";
    }elseif($dado < $_SESSION['ut']){
        echo "La tirada actual es mas pequeña que la anterior";
    }elseif($dado = $_SESSION['ut']){
        echo "La tirada actual es igual que la anterior";
    }
    }else{
        echo "Primera tirada";
    }

    $_SESSION['ut'] = $dado;
    $_SESSION['tiradas'] += 1;
    $_SESSION['sum'] += $dado;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>Tirada actual:  <?php echo $dado; ?></li>
        <li>Número de veces tirado:  <?php echo $_SESSION['tiradas']; ?></li>
        <li>Suma total de puntos: <?php echo $_SESSION['sum']; ?></li>
    </ul>

    <a href="">Tirar dado otra vez</a>
</body>
</html>