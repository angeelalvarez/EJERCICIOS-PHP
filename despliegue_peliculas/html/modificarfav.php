<?php
    require_once 'conexion.php';
    require_once 'funciones.php';
    session_start();

    $con = conectar();

    if($con === null)die("Error de conexion");

    $usuario = $_SESSION['usuario']['id'];
    $ser = findallfavoritos($con,$usuario);
    
    if($_SESSION['usuario']['rol'] !== 'user'){
        header('Location:index.php');
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $punt = $_POST['punt'];
        $comentario = $_POST['comentario'];
        $serie = $_POST['serie'] ?? '';
        


        $usuario = $_SESSION['usuario']['id'];

        if(!empty($serie) && !empty($punt && !empty($comentario))){  //El campo puntuacion no puede ser mayor que 5 si no da error
            if(isset($_POST['Modificar'])){
            if(updatefav($con,$punt,$comentario,$serie,$usuario)){
                $m = "Favorito actualizado";
            }else{
                $m = "La serie ya esta en favoritos";
            }
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
    <h1>Modificar favoritos</h1>
    <form action="" method="post">
        <input type="text" name="punt" id="punt" placeholder="Puntuación">
        <br>
        <input type="text" name="comentario" id="comentario" placeholder="Comentario">
        <br>
        <select name="serie" id="serie">
            <option value="">Selecciona una opcion</option>
            <?php foreach ($ser as $s):?>
                
                <option value="<?= $s['id'] ?>"><?= $s['titulo'] ?></option>
                

            <?php endforeach?>
        </select>
        <br>
        <input type="submit" name="Modificar" value="Modificar">
    </form>
    <br>
    <a href="favoritos.php">Volver a favoritos</a>
    <br>
    <a href="cerrarSesion.php">Cerrar sesión</a>
</body>
</html>