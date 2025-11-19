<?php 
    $errores = [];
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);
        $tel = trim($_POST['tel']);
        $cargo = $_POST['cargo'];
        $carta = $_POST['carta'];

        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacío";
        }elseif(!preg_match('/^[a-zA-Z ]{3,50}$/', $nombre)){
            $errores['nombre'] = "El nombre debe tener entre 3 y 50 caracteres, solo letras y espacios";
        }else{
            $nombre_bien = $nombre;
        }

        if(empty($correo)){
            $errores['correo'] = "El correo no puede estar vacío";
        }elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores['correo'] = "El correo no tiene un formato válido";
        }else{
            $correo_bien = $correo;
        }

        if(empty($tel)){
            $errores['tel'] = "El teléfono no puede estar vacío";
        }elseif(!preg_match('/^[6-9][0-9]{9}$/', $tel)){
            $errores['tel'] = "El teléfono debe ser un número de 10 dígitos que empiece por 6, 7, 8 o 9";
        }else{
            $tel_bien = $tel;
        }

        if(empty($cargo)){
            $errores['cargo'] = "El cargo no puede estar vacío";
        }elseif(!preg_match('/^.{2,50}$/', $cargo)){
            $errores['cargo'] = "El cargo debe tener entre 2 y 50 caracteres";
        }else{
            $cargo_bien = $cargo;
        }

        if(empty($carta)){
            $errores['carta'] = "La carta no puede estar vacía";
        }elseif(!preg_match('/^.{50,}$/', $carta)){
            $errores['carta'] = "La carta debe tener entre 50 caracteres mínimos";
        }else{
            $carta_bien = $carta;
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
    <form action="" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"><br>
        <?php echo $errores['nombre'] ?? ''?><br>
        <input type="text" name="correo" id="correo" placeholder="Correo" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"><br>
        <?php echo $errores['correo'] ?? ''?><br>
        <input type="text" name="tel" id="tel" placeholder="Teléfono" value="<?php echo htmlspecialchars($tel_bien ?? '')?>"><br>
        <?php echo $errores['tel'] ?? ''?><br>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo" value="<?php echo htmlspecialchars($cargo_bien ?? '')?>"><br>
        <?php echo $errores['cargo'] ?? ''?><br>
        <input type="text" name="carta" id="carta" placeholder="Carta de presentacion" value="<?php echo htmlspecialchars($carta_bien ?? '')?>"><br>
        <?php echo $errores['carta'] ?? ''?><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>