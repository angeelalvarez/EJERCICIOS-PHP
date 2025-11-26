<?php
    require_once 'conf_sesion.php';
    $errores = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST['nombre'] ?? '');
        $pass = $_POST['cont'];

        if(empty($nombre)){
            $errores['nombre'] = "El nombre no puede estar vacío";
        }elseif(!preg_match('/^[a-z]{7}[0-9]{3}$/', $nombre)){
            $errores['nombre'] = "El nombre debe contener 7 minúsculas seguidas de 3 números";
        }else{
            $nombre_bien = $nombre;
        }

        if(empty($pass)){
            $errores['cont'] = "La contraseña no puede estar vacía";
        }elseif(!preg_match('/[0-9]/', $pass)){
            $errores['cont'] = "La contraaseña debe tener un número";
        }else{
            $pass_bien = $pass;
        }

        if(empty($errores)){
            $_SESSION['user'] = $nombre;
            $_SESSION['inicio_sesion'] = time();
            header("Location:bienvenida.php");
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
        <h1>Inicio de sesión</h1>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre_bien ?? '')?>"><br>
        <?php echo $errores['nombre'] ?? ''?><br>
        <input type="text" name="cont" id="cont" placeholder="Contraseña" value="<?php echo htmlspecialchars($pass_bien ?? '')?>"><br>
        <?php echo $errores['cont'] ?? ''?><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>