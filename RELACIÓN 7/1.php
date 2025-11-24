<?php 
    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $eleccion = $_POST['met'];
        $tel = trim($_POST['tel']);
        $satis = $_POST['satis'] ?? null;
        $check = $_POST['mejorar'] ?? [];

        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacío";
        }elseif(!preg_match('/^[a-zA-Z ]{5,100}$/', $nombre)){
            $errores['nombre'] = "El nombre debe contener solo letras y espacios y tener entre 5 y 100 caracteres";
        }else{
            $nombre_bien = $nombre;
        }

        $formascontacto = ['email','tel','what'];
        if(empty($eleccion)){
            $errores['met'] = "Debes seleccionar uno";
        }elseif(!in_array($eleccion, $formascontacto)){
            $errores['met'] = "Metodo de contacto no válido";
        }
        else{
            $eleccion_bien = $eleccion;
        }

        if($eleccion == 'email' && empty($correo)){
            $errores['email'] = "El correo no puede estar vacío si está seleccionado";
        }elseif(!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL) === false){
            $errores['email'] = "No tiene un formato válido";
        }else{
            $correo_bien = $correo;
        }

        if(($eleccion == 'tel' || $eleccion == 'what') && empty($tel)){
            $errores['tel'] = "El teléfono no puede estar vacío si hemos seleccionado teléfono o whatsapp";
        }elseif(!empty($tel) && !preg_match('/^[6-9][0-9]{8}$/', $tel)){
            $errores['tel'] = "El teléfono debe contener 9 dígitos y ser un número";
        }else{
            $tel_bien = $tel;
        }

        $arraysa = ['muy_satisfecho','satisfecho','neutral','insatisfecho','muy_insatisfecho'];
        if(empty($satis)){
            $errores['satis'] = "Debes seleccionar uno";
        }elseif(!in_array($satis,$arraysa)){
            $errores['satis'] = "Opción no válida";
        }else{
            $satis_bien = $satis;
        }


        $arraymej = ['atencion','tiempo','calidad','precio','exp'];
        if(count($check) > 3){
            $errores['mejorar'] = "Solo puedes seleccionar hasta 3 opciones";
        }elseif(!empty(array_diff($check,$arraymej))){  //COMPARA LOS ARRAYS Y TE DA EL VALOR DIFERENTE
            $errores['mejorar'] = "Opción no válida";
        }else{
            $check_bien = $check;
        }




        if(empty($errores)){
            echo "Nombre: " .htmlspecialchars($nombre_bien). "<br>";
            echo "Método de contacto: " .htmlspecialchars($eleccion_bien). "<br>";
            echo "Correo: " .htmlspecialchars($correo_bien). "<br>";
            echo "Teléfono: " .htmlspecialchars($tel_bien). "<br>";
            echo "Nivel de satisfaciión: " .htmlspecialchars($satis_bien). "<br>";
            foreach($check_bien as $m){
                echo "$m <br>";
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
    <form action="" method="post">

        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"><br>
        <?php echo $errores['nombre'] ?? ''?><br>

        <select name="met" id="met">
            <option value="">Seleccione un método de contacto</option><br>
            <option value="email" <?php if(isset($eleccion_bien) && $eleccion_bien == 'email') echo 'selected'?>>Correo Electrónico</option><br>
            <option value="tel" <?php if(isset($eleccion_bien) && $eleccion_bien == 'tel') echo 'selected'?>>Teléfono</option><br>
            <option value="what" <?php if(isset($eleccion_bien) && $eleccion_bien == 'what') echo 'selected'?>>WhatsApp</option><br>
        </select><br>

        <?php echo $errores['met'] ?? ''?><br>
        <input type="text" name="email" id="email" placeholder="Correo" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"><br>
        <?php echo $errores['email'] ?? ''?><br>

        <input type="text" name="tel" id="tel" placeholder="Teléfono" value="<?php echo htmlspecialchars($tel_bien ?? '')?>"><br>
        <?php echo $errores['tel'] ?? ''?><br>

        <label for="nivel"><br>
            Nivel de satisfacción: <br>
            <input type="radio" id="muy-satisfecho" name="satis" value="muy_satisfecho" <?php if(isset($satis_bien) && $satis_bien == 'muy_satisfecho') echo 'checked'?>> Muy satisfecho <br>
            <input type="radio" id="satisfecho" name="satis" value="satisfecho" <?php if(isset($satis_bien) && $satis_bien == 'satisfecho') echo 'checked'?>> Satisfecho <br>
            <input type="radio" id="neutral" name="satis" value="neutral" <?php if(isset($satis_bien) && $satis_bien == 'neutral') echo 'checked'?>> Neutral <br>
            <input type="radio" id="insatisfecho" name="satis" value="insatisfecho" <?php if(isset($satis_bien) && $satis_bien == 'insatisfecho') echo 'checked'?>> Insatisfecho <br>
            <input type="radio" id="muy-insatisfecho" name="satis" value="muy_insatisfecho" <?php if(isset($satis_bien) && $satis_bien == 'muy_insatisfecho') echo 'checked'?>> Muy insatisfecho <br>
        </label>
          <?php  echo $errores['satis'] ?? ''?><br><br>
        
        
            
       <label for="check">
        Cosas a mejorar: <br>
            <input type="checkbox"  name="mejorar[]" value="atencion" <?php if(isset($check_bien) && in_array('atencion',$check_bien)) echo 'checked'?>> Atención al cliente <br>
            <input type="checkbox"  name="mejorar[]" value="tiempo" <?php if(isset($check_bien) && in_array('tiempo',$check_bien)) echo 'checked'?>> Tiempo de espera <br>
            <input type="checkbox"  name="mejorar[]" value="calidad" <?php if(isset($check_bien) && in_array('calidad',$check_bien)) echo 'checked'?>> Calidad del producto <br>
            <input type="checkbox"  name="mejorar[]" value="precio" <?php if(isset($check_bien) && in_array('precio',$check_bien)) echo 'checked'?>> Precio <br>
            <input type="checkbox"  name="mejorar[]" value="exp" <?php if(isset($check_bien) && in_array('exp',$check_bien)) echo 'checked'?>> Experiencia en la web <br><br>
       </label>
       <?php  echo $errores['mejorar'] ?? ''?><br><br>

            

            <input type="submit" value="Enviar">

    </form>
</body>
</html>
