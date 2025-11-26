<?php
    $errores = [];

    $precios_serv = [
        'vacunacion' => 40,
        'desp' => 25,
        'pel' => 35,
        'consulta' => 50
    ];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre']);
        $correo = filter_var($_POST['correo'],FILTER_SANITIZE_EMAIL);
        $radio = $_POST['mascota'] ?? '';
        $check = $_POST['serv'] ?? [];
        $select = $_POST['frec'];
        $cod = $_POST['desc'];


        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacío";
        }elseif(!preg_match('/^[a-zA-Z ]{3,50}$/',$nombre)){
            $errores['nombre'] = "El nombre debe tener letras y espacios y entre 3 y 50 caracteres";
        }else{
            $nombre_bien = $nombre;
        }

        if(empty($correo)){
            $errores['correo'] = "El correo no puede estar vacío";
        }elseif(filter_var($correo,FILTER_VALIDATE_EMAIL) === false){
            $errores['correo'] = "El correo no tiene un formato válido";
        }else{
            $correo_bien = $correo;
        }

        $arraymasc = ['perro','gato','ave','otro'];
        if(empty($radio)){
            $errores['mascota'] = "Debes seleccionar una";
        }elseif(!in_array($radio,$arraymasc)){
            $errores['mascota'] = "Opción no válida";
        }else{
            $radio_bien = $radio;
        }

        $arrayserv = ['vacunacion','desp','pel','consulta'];
        if(count($check) < 2 || count($check) > 4){
            $errores['serv'] = "Debes seleccionar de 2 a 4 opciones";
        }elseif(!empty(array_diff($check,$arrayserv))){
            $errores['serv'] = "Opción no válida";
        }else{
            $check_bien = $check;
        }

        $arraysel = ['puntual','mensual','trim','sem'];
        if(empty($select)){
            $errores['frec'] = "Debes seleccionar una";
        }elseif(!in_array($select,$arraysel)){
            $errores['frec'] = "No es una opción válida";
        }else{
            $select_bien = $select;
        }


        
        if(!empty($cod)){
            if(!preg_match('/^descuento(\d{1,2})$/i',$cod)){
                $errores['desc'] = "Debe empezar por la palabra descuento y contener 2 números al final";
            }else{
                $numdesc = filter_var($cod, FILTER_SANITIZE_NUMBER_INT);
            }
            
        }
        
        

        if(empty($errores)){
            $coste = 0;
            foreach($check as $c){
                $coste += $precios_serv[$c];
            }
            if($select == 'puntual'){
                    $total = $coste;
                }elseif($select == 'mensual'){
                    $total = ($coste * 12) * 0.85;
                }elseif($select == 'trim'){
                    $total = ($coste * 4) * 0.9;
                }elseif($select == 'sem'){
                    $total = ($coste * 2) * 0.95;
                }
            
            if(isset($numdesc)){
                echo "El total a pagar es de: ".$total * (1-($numdesc/100));
            }else{
                echo "El total a pagar es de: ".$total;
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
    <h1>Registro de mascotas</h1>
    <form action="" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"> <br>
        <?php echo $errores['nombre'] ?? ''?> <br><br>

        <input type="text" name="correo" id="correo" placeholder="Correo" value="<?php echo htmlspecialchars($correo_bien ?? '')?>"> <br>
        <?php echo $errores['correo'] ?? ''?> <br><br>

    <label for="mascota">
        Tipo de Mascota: <br>
        <input type="radio" name="mascota" id="mascota" value="perro" <?php if(isset($radio_bien) && $radio_bien == 'perro') echo "checked"?>> Perro <br>
        <input type="radio" name="mascota" id="mascota" value="gato" <?php if(isset($radio_bien) && $radio_bien == 'gato') echo "checked"?>> Gato <br>
        <input type="radio" name="mascota" id="mascota" value="ave" <?php if(isset($radio_bien) && $radio_bien == 'ave') echo "checked"?>> Ave <br>
        <input type="radio" name="mascota" id="mascota" value="otro" <?php if(isset($radio_bien) && $radio_bien == 'otro') echo "checked"?>> Otro <br>
    </label>
    <?php echo $errores['mascota'] ?? ''?> <br><br>
        

    <label for="serv">
        Tipo de servicio: <br>
       <input type="checkbox" name="serv[]" value="vacunacion" <?php if(isset($check_bien) && in_array('vacunacion',$check_bien)) echo "checked" ?>> Vacunación (40 €) <br>
        <input type="checkbox" name="serv[]" value="desp" <?php if(isset($check_bien) && in_array('desp',$check_bien)) echo "checked" ?>> Desparasitación (25 €) <br>
        <input type="checkbox" name="serv[]" value="pel" <?php if(isset($check_bien) && in_array('pel',$check_bien)) echo "checked" ?>> Peluquería (35 €) <br>
        <input type="checkbox" name="serv[]" value="consulta" <?php if(isset($check_bien) && in_array('consulta',$check_bien)) echo "checked" ?>> Consulta veterinaria (50 €) <br>     
    </label>
    <?php echo $errores['serv'] ?? ''?> <br><br>
        

        <label for="frec">
            Frecuencia:
            <select name="frec" id="frec">
            <option value="">Selecciona una opción</option>
            <option value="puntual" <?php if(isset($select_bien) && $select_bien == 'puntual') echo "selected"?>>Puntual</option><br>
            <option value="mensual" <?php if(isset($select_bien) && $select_bien == 'mensual') echo "selected"?>>Mensual</option><br>
            <option value="trim" <?php if(isset($select_bien) && $select_bien == 'trim') echo "selected"?>>Trimestral</option><br>
            <option value="sem" <?php if(isset($select_bien) && $select_bien == 'sem') echo "selected"?>>Semestral</option><br>
        </select>
        </label><br>
        <?php echo $errores['frec'] ?? ''?> <br><br>

        <input type="text" name="desc" id="desc" placeholder="Código descuento"><br>
        

        <input type="submit" value="Enviar">
    </form>
</body>
</html>