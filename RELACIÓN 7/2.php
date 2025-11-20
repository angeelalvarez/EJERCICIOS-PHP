<?php
    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);
        $fecha = trim($_POST['fecha']);
        $tp = $_POST['tp'] ?? null;
        $ti = $_POST['ti'] ?? [];
        $eleccion = $_POST['ciudad'];


        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacio";
        }elseif(!preg_match('/^[a-zA-Z ]{5,100}$/',$nombre)){
            $errores['nombre'] = "El nombre debe contener solo letras y espacios y tener entre 5 y 100 caracteres";
        }else{
            $nombre_bien = $nombre;
        }

        if(empty($correo)){
            $errores['correo'] = "El correo no puede estar vacio";
        }elseif(filter_var($correo, FILTER_VALIDATE_EMAIL) === false){
            $errores['correo'] = "El correo no tiene un formato válido";
        }else{
            $correo_bien = $correo;
        }

        
        if(empty($fecha)){
            $errores['fecha'] = "La fecha no puede estar vacia";
        }elseif(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/',$fecha)) //INMA PREGUNTAR
            $errores['fecha'] = "La fecha no tiene un formato válido";
        else{
            $fecha_bien = $fecha;
        }

        if(empty($tp)){
            $errores['tp'] = "Debes seleccionar uno";
        }else{
            $tp_bien = $tp;
        }

        if(count($ti) < 2 || count($ti) > 4){
            $errores['ti'] = "Debes seleccionar entre 2 y 4 temas";
        }else{
            $ti_bien = $ti;
        }

        $array = ['madrid','barca','sev','valencia'];
        if(empty($eleccion)){
            $errores['ciudad'] = "Debes seleccionar una";
        }elseif(!in_array($eleccion,$array)){
            $errores['ciudad'] = "No es una opción válida";
        }else{
            $eleccion_bien = $eleccion;
        }

    
           if(in_array('ci',$ti)){
           if($eleccion != 'madrid' && $eleccion != 'barca'){
             $errores['ciudad'] = "Si seleccionmos Ciberseguridad la ciudad debe ser Madrid o Barcelona";
           }
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
    <h1>REGISTRO A UN TALLER</h1>
    <form action="" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"><br>
        <?php echo $errores['nombre'] ?? '' ?> <br>
        <input type="text" name="correo" id="correo" placeholder="Correo" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"><br>
        <?php echo $errores['correo'] ?? '' ?> <br>
        <input type="text" name="fecha" id="fecha" placeholder="Fecha" value="<?php echo htmlspecialchars($fecha_bien ?? '')?>"><br>
        <?php echo $errores['fecha'] ?? '' ?> <br><br>
        <label for="tp">
            Tipo de participación: <br>
            <input type="radio" name="tp" id="tp" value="asistente" <?php if(isset($tp_bien) && $tp_bien == 'asistente') echo 'checked'?>> Asistente <br>
            <input type="radio" name="tp" id="tp" value="ponente" <?php if(isset($tp_bien) && $tp_bien == 'ponente') echo 'checked'?>> Ponente <br>
        </label>
        <?php echo $errores['tp'] ?? '' ?> <br><br>
        <label for="ti">
            Temas de interés: <br>
            <input type="checkbox" name="ti[]" value="pro" <?php //if(isset($ti_bien) && in_array('pro',$ti_bien)) echo 'checked'   (CON ESTO HACEMOS QUE LOS CHECKBOX SE MANTENGAN SI NOS LO PIDEN)?>> Programación <br>
            <input type="checkbox" name="ti[]" value="ci" <?php //if(isset($ti_bien) && in_array('ci',$ti_bien)) echo 'checked'?>> Ciberseguridad <br>
            <input type="checkbox" name="ti[]" value="ia" <?php //if(isset($ti_bien) && in_array('ia',$ti_bien)) echo 'checked'?>> Inteligencia artificial <br>
            <input type="checkbox" name="ti[]" value="red" <?php //if(isset($ti_bien) && in_array('red',$ti_bien)) echo 'checked'?>> Redes <br>
            <input type="checkbox" name="ti[]" value="dw" <?php //if(isset($ti_bien) && in_array('dw',$ti_bien)) echo 'checked'?>> Desarrollo web <br>
        </label>
        <?php echo $errores['ti'] ?? '' ?> <br><br>

        <select name="ciudad" id="ciudad">
            <option value="">Selecciona una opción</option>
            <option value="madrid" <?php if(isset($eleccion_bien) && $eleccion_bien == 'madrid') echo 'selected'?>>Madrid</option>
            <option value="barca" <?php if(isset($eleccion_bien) && $eleccion_bien == 'barca') echo 'selected'?>>Barcelona</option>
            <option value="sev" <?php if(isset($eleccion_bien) && $eleccion_bien == 'sev') echo 'selected'?>>Sevilla</option>
            <option value="valencia" <?php if(isset($eleccion_bien) && $eleccion_bien == 'valencia') echo 'selected'?>>Valencia</option>
        </select><br>
        <?php echo $errores['ciudad'] ?? '' ?> <br><br>
        <input type="submit" value="Enviar"><br><br>

        <?php if(empty($errores)){
            echo "El registro se ha realizado con éxito";
        }?>


        

        


    </form>
</body>
</html>