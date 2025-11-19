<?php 
    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $contraseña = $_POST['pass'];
        $telf = trim($_POST['tel']);
        $edad = $_POST['edad'];

        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacio";
        }elseif(!preg_match('/^[a-zA-Z ]{3,50}$/', $nombre)){
            $errores['nombre'] = "El nombre no tiene el formato correcto";
        }else{
            $nombre_bien = $nombre;
        }

        if(empty($correo)){
            $errores['correo'] = "El correo no puede estar vacio";
        }elseif(filter_var($correo,FILTER_VALIDATE_EMAIL) === false){
            $errores['correo'] = "El email no tiene el formato correcto";
        }else{
            $correo_bien = $correo;
        }

        if(empty($contraseña)){
            $errores['pass'] = "La contraseña no puede estar vacía";
        }elseif(mb_strlen($contraseña, "UTF-8") < 8){
            $errores['pass'] = "La contaseña debe tener al menos 8 caracteres";
        }else{
            $contraseña_bien = $contraseña;
        }

        if(empty($telf)){
            $errores['tel'] = "El teléfono no puede estar vacío";
        }elseif(!preg_match('/^\d{10}$/', $telf)){
            $errores['tel'] = "El teléfono debe tener 10 dígitos exactamente";
        }else{
            $telf_bien = $telf;
        }

        if(empty($edad)){
            $errores['edad'] = "La edad no puede estar vacía";
        }elseif(!filter_var($edad, FILTER_VALIDATE_INT)){
            $errores['edad'] = "La edad debe ser un número entero";
        }elseif(!preg_match('/^(\d|[1-9]\d|1[0-1]\d|120)$/', $edad)){
            $errores['edad'] = "La edad debe ser un número en 0 y 120";
        }else{
            $edad_bien = $edad;
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
        <input type="text" name="correo" id="correo" placeholder="Correo electrónico" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"><br>
        <?php echo $errores['correo'] ?? ''?><br>
        <input type="text" name="pass" id="pass" placeholder="Contraseña" value="<?php echo htmlspecialchars($contraseña_bien ?? '')?>"><br>
        <?php echo $errores['pass'] ?? ''?><br>
        <input type="text" name="tel" id="tel" placeholder="Teléfono" value="<?php echo htmlspecialchars($telf_bien ?? '')?>"><br>
        <?php echo $errores['tel'] ?? '' ?><br>
        <input type="text" name="edad" id="edad" placeholder="Edad" value="<?php echo htmlspecialchars($edad_bien ?? '')?>" ><br>
        <?php echo $errores['edad'] ?? '' ?><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>