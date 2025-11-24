<?php
    require_once 'config_sesion.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pass = $_POST['contraseña'];

        if(($user == "Batman" || $user == "Alfred") && $pass == "1234"){
            //Login correcto
           
            $_SESSION['user'] = $user;
            $_SESSION['ultimo_movimiento'] = time();
            header("Location:batcueva.php");
        }else{
            //Login incorrecto
            echo "Login incorrecto";
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
    <h1>Acceso a la batcueva</h1>
    <form action="" method="post">
        <input type="text" name="user" id="user" placeholder = "Usuario"><br>
        <input type="text" name="contraseña" id="contraseña" placeholder = "Contraseña"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>