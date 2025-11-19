<?php
   $errores = [];
   
   if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        $nombre = $_POST['nombre'];
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $tel = trim($_POST['telf']);
        $cant = intval($_POST['cant']);

        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacio";
        }elseif(!preg_match('/^[a-zA-Z ]{5,100}$/', $nombre)){
            $errores['nombre'] = "El nombre debe contener letras y espacios unicamente y tener entre 5 y 100 caracteres";
        }else{
            $nombre_bien = $nombre;
        }

        if(empty($correo)){
            $errores['correo'] = "El correo no puede estar vacío";
        }elseif(filter_var($correo, FILTER_VALIDATE_EMAIL) === false){
            $errores['correo'] = "El correo no tiene un formato válido";
        }else{
            $correo_bien = $correo;
        }

        if(empty($tel)){
            $errores['telf'] = "El teléfono no puede estar vacío";
        }elseif(!preg_match_all('/^[0-9]{10}$/', $tel)){
            $errores['telf'] = "El teléfono debe ser un número de 10 dígitos";
        }else{
            $tel_bien = $tel;
        }
        
        if(empty($cant)){
            $errores['cant'] = "La cantidad no puede estar vacía";
        }elseif(filter_var($cant, FILTER_VALIDATE_INT) === false){
            $errores['cant'] = "La cantidad debe ser un número";
        }elseif(!preg_match("/^([1-9]|10)$/", $cant)){
            $errores['cant'] = "La cantidad debe ser un número entr 1 y 10";
        }else{
            $cant_bien = $cant;
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
        <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"><br>
        <?php echo $errores['nombre'] ?? '' ?><br>
        <input type="text" name="correo" id="correo" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"><br>
        <?php echo $errores['correo'] ?? ''?><br>
        <input type="text" name="telf" id="telf" value="<?php echo htmlspecialchars($tel_bien ?? '')?>"><br>
        <?php echo $errores['telf'] ?? '' ?><br>
        <input type="text" name="cant" id="cant" value="<?php echo htmlspecialchars($cant_bien ?? '')?>"><br>
        <?php echo $errores['cant'] ?? ''?><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>