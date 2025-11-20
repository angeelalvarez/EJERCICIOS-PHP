<?php
    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);


        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacio";
        }elseif(preg_match('/^[a-zA-Z ]{5,100}$/',$nombre)){
            $errores['nombre'] = "El nombre debe contener solo letras y espacios y tener entre 5 y 100 caracteres";
        }else{
            $nombre_bien = $nombre;
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
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" <?php echo htmlspecialchars($nombre ?? '')?>><br>
        <?php echo $errores['nombre'] ?? '' ?> <br>
        <input type="text" name="correo" id="correo" placeholder="Correo"><br>

        <input type="date" name="fecha" id="fecha"><br>

        <label for="tp">
            Tipo de participación: <br>
            <input type="radio" name="tp" id="tp" value="asistente"> Asistente <br>
            <input type="radio" name="tp" id="tp" value="ponente"> Ponente <br>
        </label>

        <label for="ti">
            Temas de interés: <br>
            <input type="checkbox" name="ti[]" value="pro"> Programación <br>
            <input type="checkbox" name="ti[]" value="ci"> Ciberseguridad <br>
            <input type="checkbox" name="ti[]" value="ia"> Inteligencia artificial <br>
            <input type="checkbox" name="ti[]" value="red"> Redes <br>
            <input type="checkbox" name="ti[]" value="dw"> Desarrollo web <br>
        </label>

        <select name="ciudad" id="ciudad">
            <option value="">Selecciona una opción</option>
            <option value="madrid">Madrid</option>
            <option value="barca">Barcelona</option>
            <option value="sev">Sevilla</option>
            <option value="valencia">Valencia</option>
        </select><br>

        <input type="submit" value="Enviar">


        

        


    </form>
</body>
</html>