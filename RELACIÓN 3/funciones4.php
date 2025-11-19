<?php
   require_once 'funciones4.4.php';
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tabla = $_POST['tabla'];
        $salida = tabla($tabla);
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
    <form action="" method="post">
        <label for="table">
            Tabla:
            <input type="text" name= "tabla" id="tabla">
        </label><br>
        <input type="submit" value="Mostrar">
    </form>

    <?php 
    
        if(isset($salida)) echo $salida;
    ?>
</body>
</html>