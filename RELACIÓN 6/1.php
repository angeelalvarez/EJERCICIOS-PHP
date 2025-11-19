<?php

    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dist = $_POST['dist'];
        $ti = $_POST['tiem'];
        

        if(empty($dist)){
            $errores['dist'] = "La distancia no puede estar vacia";
        }elseif(!is_numeric($dist)){
            $errores['dist'] = "La distancia debe ser un número";
        }elseif(!preg_match('/^[1-9][0-9]*$/', $dist)){
            $errores['dist'] = "La distancia debe ser un número positivo";
        }

        if(empty($ti)){
            $errores['tiem'] = "El tiempo no puede estar vacío";
        }elseif(!preg_match('/^([0-9]|[1-9][0-9]|1[0-1][0-9]|120)$/', $ti)){
            $errores['tiem'] = "El tiempo debe ser un número entre 0 y 120";
        }

        if(empty($errores)){
            $totalkm = 1.5 * $dist;
            $totalti = 0.5 * $ti;
            $total = $totalkm + $totalti + 3;
        }

       
        
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
    <h1>CALCULADORA DE PRECIOS</h1>
    <form action="" method="post">
        <input type="text" name="dist" id="dist" placeholder="Distancia" ><br>
        <?php echo $errores['dist'] ?? '' ?><br>
        <input type="text" name="tiem" id="tiem" placeholder="Tiempo" ><br>
        <?php echo $errores['tiem'] ?? '' ?><br>
        <input type="submit" value="Enviar"><br><br>
        <?php echo $total ?? ''?>
        
    </form>
</body>
</html>