<?php
    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $tel = trim($_POST['tel']);
        $fecha = $_POST['fecha'];
        $fecha_actual = date('Y-m-d');
        $num = intval($_POST['num']);

        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacío";
        }elseif(!preg_match('/^[a-zA-Z ]{5,100}$/', $nombre)){
            $errores['nombre'] = "El nombre debe tener entre 5 y 100 caracteres, solo letras y espacios";
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
            $errores['tel'] = "El teléfono no puede estar vacío";
        }elseif(!preg_match('/^[6-7][0-9]{9}$/', $tel)){
            $errores['tel'] = "El teléfono debe contener 10 números y empezar por 6 o 7";
        }else{
            $tel_bien = $tel;
        }

        if(empty($fecha)){
            $errores['fecha'] = "La fecha no puede estar vacía";
        }elseif($fecha < $fecha_actual){
            $errores['fecha'] = "La fecha no puede ser anterior a la actual";
        }else{
            $fecha_bien = $fecha;
        }

        if(empty($num)){
            $errores['num'] = "El nº de noches no puede estar vacío";
        }elseif($num < 1 || $num > 30){
            $errores['num'] = "El nº de noches debe ser un número entre el 1 y el 30";
        }else{
            $num_bien = $num;
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
        <input type="date" name="fecha" id="fecha" placeholder="Fecha de entrada" value="<?php echo htmlspecialchars($fecha_bien ?? '')?>"><br>
        <?php echo $errores['fecha'] ?? ''?><br>
        <input type="text" name="num" id="num" placeholder="Número noches" value="<?php echo htmlspecialchars($num_bien ?? '')?>"><br>
        <?php echo $errores['num'] ?? ''?><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>