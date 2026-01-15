<?php
    require_once 'conexion.php';
    require_once 'funciones.php';

    session_start();

    if($_SESSION['usuario']['rol'] !== 'admin'){
        header('Location:index.php');
        exit;
    }

                $con = conectar();
                if($con === null)die("Error de conexion");

                $plataf = findplat($con);

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $fecha = $_POST['fecha'];
                $plat = $_POST['plat'];

                

                
            if(existeTitulo($con,$titulo)){
                $m = "Ya existe";
            }else{
                if(isset($_POST['Añadir'])){
                    if(insertseries($con,$titulo,$plat,$fecha)){
                        $m = "Serie insertada";
                    }else{
                        $m = "Error al insertar la serie";
                    }
                }
            }

                

                if(isset($_POST['Modificar'])){
                    if(updateseries($con,$id,$titulo,$plat,$fecha)){
                        $m = "Serie modificada";
                    }else{
                        $m = "Error al modificar la serie";
                    }
                }

                
    }

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir/Modificar serie</title>
</head>
<body>
    <h1>Añadir/Modificar serie</h1>
    <form action="" method="post">
        <input type="text" name="id" id="id" placeholder="ID (Solo para modificar)">
        <br>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
        <br>
        <input type="date" name="fecha" id="fecha" placeholder="Fecha de publicación">
        <br>
        <select name="plat" id="plat">
            <option value="">Selecciona una opción</option>
            <?php foreach ($plataf as $p):?>
                <option value="<?= $p['id'] ?>"><?= $p['nombre'] ?></option>
            <?php endforeach?>
        </select>
        <br>
        <input type="submit" name="Añadir" value="Añadir">
        <input type="submit" name="Modificar" value="Modificar">
    </form>
    <br>
    <a href="series.php">Volver a series</a>
    <br>
    <a href="cerrarSesion.php">Cerrar sesión</a>
</body>
</html>




