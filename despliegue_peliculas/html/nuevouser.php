<?php
    require_once 'conexion.php';
    require_once 'funciones.php';

    session_start();

    $con = conectar();

    if($con === null)die("Error de conexion");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['username'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];

        if(isset($_POST['Registrar'])){
             if(insertuser($con,$user,$pass,$name)){
                $m = "Usuario registrado";
            }else{
                $m = "Error al registrar";
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
    <h1>Registro de usuario</h1>
    <form action="" method="post">
        <input type="text" name="username" id="username" placeholder="Nombre de usuario">
        <br>
        <input type="text" name="pass" id="pass" placeholder="Contraseña">
        <br>
        <input type="text" name="name" id="name" placeholder="Nombre completo">
        <br>
        <input type="submit" name="Registrar" value="Registrar">
    </form>
    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>