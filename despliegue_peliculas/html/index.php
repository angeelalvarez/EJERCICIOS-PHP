<?php
    require_once 'conexion.php';
    require_once 'funciones.php';
    session_start();
    //echo password_hash('oretania', PASSWORD_DEFAULT);

    


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['username'];
        $pass = $_POST['pass'];

        $con = conectar();

        if($con === null)die('Error de conexion');

        $usuario = finduser($con,$user);

       if($usuario && password_verify($pass, $usuario['password'])){
            $_SESSION['usuario'] = $usuario;
            unset($_SESSION['usuario']['password']);

            if($usuario['rol'] == 'admin'){
                header('Location:series.php');
                exit;
            }elseif($usuario['rol'] == 'user'){
                header('Location:favoritos.php');
                exit;
            }
       }else{
            echo "Usuario y/o contraseña incorrectos";
       }


    }

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>OretaFilms</title>
</head>
<body>
    <h1>OretaFilms</h1>
    <form action="" method="post">
        <input type="text" name="username" id="username" placeholder="Nombre de Usuario">
        <br>
        <input type="text" name="pass" id="pass" placeholder="Contraseña">
        <br>
        <input type="submit" value="Entrar">
        <a href="nuevouser.php">Registrar</a>
    </form>
</body>
</html>