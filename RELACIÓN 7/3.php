<?php
    $errores = [];
    $precio_final = 0;

    $precio_entrada = [
        'general' => 20,
        'palco' => 40,
        'vip' => 60

    ];

    $precio_extras = [
        'camiseta' => 5,
        'pulsera' => 3,
        'comida' => 20,
        'meet' => 15,
        'transporte' => 10
    ];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);
        $te = $_POST['te'] ?? null;
        $can = $_POST['can'];
        $ext = $_POST['ext'] ?? [];


        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacío";
        }elseif(!preg_match('/^[a-zA-Z ]{5,100}$/',$nombre)){
            $errores['nombre'] = "El nombre solo puede tener letras y espacios y entre 5 y 100 caracteres";
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

        if(empty($te)){
            $errores['te'] = "Debes seleccionar una";
        }elseif(!array_key_exists($te,$precio_entrada)){
            $errores['te'] = "Opción no válida";
        }else{
            $te_bien = $te;
        }

        $arraycant = ['1','2','3','4','5'];
        if(empty($can)){
            $errores['can'] = "Debes seleccionar una";
        }elseif(!in_array($can,$arraycant)){
            $errores['can'] = "Opción no válida";
        }else{
            $can_bien = $can;
        }

        $arrayext = ['camiseta','pulsera','comida','meet','transporte'];
        if(count($ext) < 2 || count($ext) > 4){
            $errores['ext'] = "Debes seleccionar entre 2 y 4 opciones";
        }elseif(!empty(array_diff($ext,$arrayext))){
            $errores['ext'] = "Opción no válida";
        }else{
            $ext_bien = $ext;
        }

    
        
        

        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de entradas</title>
</head>
<body>
    <h1>RESERVA DE ENTRADAS</h1>
    <form action="" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"><br>
        <?php echo $errores['nombre'] ?? '' ?> <br>
        <input type="text" name="correo" id="correo" placeholder="Correo" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"><br>
        <?php echo $errores['correo'] ?? '' ?> <br><br>
        
        <label for="te">
            Tipo de entrada: <br>
            <input type="radio" name="te" id="te" value="general" <?php if(isset($te_bien) && $te_bien == 'general') echo 'checked'?>> General<br>
            <input type="radio" name="te" id="te" value="palco" <?php if(isset($te_bien) && $te_bien == 'palco') echo 'checked'?>> Palco<br>
            <input type="radio" name="te" id="te" value="vip" <?php if(isset($te_bien) && $te_bien == 'vip') echo 'checked'?>> VIP<br>
        </label>
        <?php echo $errores['te'] ?? '' ?> <br><br>
        
        <label for="can">
            <select name="can" id="can">
            <option value="">Selecciona una cantidad</option>
            <option value="1" <?php if(isset($can_bien) && $can_bien == '1') echo 'selected'?>>1</option>
            <option value="2" <?php if(isset($can_bien) && $can_bien == '2') echo 'selected'?>>2</option>
            <option value="3" <?php if(isset($can_bien) && $can_bien == '3') echo 'selected'?>>3</option>
            <option value="4" <?php if(isset($can_bien) && $can_bien == '4') echo 'selected'?>>4</option>
            <option value="5" <?php if(isset($can_bien) && $can_bien == '5') echo 'selected'?>>5</option>
        </select><br>
        </label>
        <?php echo $errores['can'] ?? '' ?> <br><br>

         <label for="ext">
            Temas de interés: <br>
            <input type="checkbox" name="ext[]" value="camiseta" <?php if(isset($ext_bien) && in_array('camiseta',$ext_bien)) echo 'checked'?>> Camiseta del evento (+ 5 €/unid) <br>
            <input type="checkbox" name="ext[]" value="pulsera" <?php if(isset($ext_bien) && in_array('pulsera',$ext_bien)) echo 'checked'?>> Pulsera VIP (+ 3 €/unid) <br>
            <input type="checkbox" name="ext[]" value="comida" <?php if(isset($ext_bien) && in_array('comida',$ext_bien)) echo 'checked'?>> Comida incluida (+ 20 €/unid) <br>
            <input type="checkbox" name="ext[]" value="meet" <?php if(isset($ext_bien) && in_array('meet',$ext_bien)) echo 'checked'?>> Acceso a meet & greet (+ 15 €/unid) <br>
            <input type="checkbox" name="ext[]" value="transporte" <?php if(isset($ext_bien) && in_array('transporte',$ext_bien)) echo 'checked'?>> Transporte al evento (+ 10 €/unid) <br>
        </label>
        <?php echo $errores['ext'] ?? '' ?> <br><br>

        <input type="submit" value="Enviar"><br><br>

        <?php     
        $costesext = 0;
        if(empty($errores)){
            $coste = $precio_entrada[$te] * $can;
            foreach($ext as $e){
                 $costesext += $precio_extras[$e];
            }
            $precio_final = $coste + $costesext;
            echo "El precio final es de: $precio_final";
        }
        ?>
</body>
</html>