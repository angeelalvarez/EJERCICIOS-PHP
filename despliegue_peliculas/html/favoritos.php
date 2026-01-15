<?php
    require_once 'conexion.php';
    require_once 'funciones.php';

    session_start();

    if($_SESSION['usuario']['rol'] !== 'user'){
        header('Location:index.php');
        exit;
    }

    $usuario = $_SESSION['usuario']['id'];

    $con = conectar();
    if($con === null)die("Error de conexion");

    $favorito = findallfavoritos($con,$usuario);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $serie = $_POST['serie'] ?? '';

    
    if(!empty($serie)){
        if(isset($_POST['serie'])){
            if(delfav($con,$serie,$usuario)){
                $m = "Serie borrada de favoritos";
            }else{
                $m = "Error al borrar";
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
    <h2>ELIMINAR FAVORITO</h2>
    <h3>Introduce el título de la serie que deseas borrar de favoritos</h3>
    <form action="" method="post">
        <select name="serie" id="serie">
            <option value="">Selecciona una opción</option>
            <?php foreach($favorito as $f):?>
                <option value="<?= $f['id']?>"><?= $f['titulo'] ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <input type="submit" name="Borrar" value="Borrar">
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>SERIE</th>
                <th>PUNTUACIÓN</th>
                <th>COMENTARIOS</th>
                <th>FECHA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favorito as $f):?>
            <tr>
                <td><?= $f['titulo'] ?></td>
                <td><?= $f['puntuacion'] ?></td>
                <td><?= $f['comentario'] ?></td>
                <td><?= $f['fecha'] ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <br>
    <a href="nuevofav.php">Añadir favorito</a>
    <br>
    <a href="modificarfav.php">Modificar favorito</a>
    <br>
    <a href="cerrarSesion.php">Cerrar sesión</a>
</body>
</html>