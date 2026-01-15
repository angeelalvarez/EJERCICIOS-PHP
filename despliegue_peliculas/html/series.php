<?php
    require_once 'conexion.php';
    require_once 'funciones.php';
    session_start();

    $con = conectar();
    $series = findallseries($con);

    if($con === null)die("Error de conexion");


    if($_SESSION['usuario']['rol'] !== 'admin'){
        header('Location:index.php');
        exit;
    }

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $plat = $_POST['plat'];
        $fecha = $_POST['fecha'];



        if(isset($_POST['Borrar'])){   //Si la serie esta anclada a la tabla favoritos no se borra
            if(delseries($con,$titulo)){
                $m = "Serie borrada";
            }else{
                $m = "Error al borrar la serie";}
            }
   
        

        header('Location:series.php');
        exit;

         
         
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de series</title>
</head>
<body>
    <h2>ELIMINAR SERIE</h2>
    <h4>Introduce el título de la serie que deseas borrar</h4>
    <form action="" method="post">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
        <br>
        <input type="submit" name="Borrar" value="Borrar">
    </form>
    <br>
    <?php echo $m ?? ''?>




    <h2>LISTA DE SERIES</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>PLATAFORMA</th>
                <th>ID_PLATAFORMA</th>
                <th>FECHA_PUBLI</th>
            </tr>
        </thead>
        <tbody>
                    <?php foreach ($series as $s):?>
                        <tr>
                            <td><?= $s['id'] ?></td>
                            <td><?= $s['titulo'] ?></td>
                            <td><?= $s['nombre'] ?></td>
                            <td><?= $s['id_plat'] ?></td>
                            <td><?= $s['fecha_publi'] ?></td>
                        </tr>
                    <?php endforeach?>
        </tbody>
    </table>
    <br>
    <a href="nuevaserie.php">Añadir/Modificar series</a><br>
    <a href="cerrarSesion.php">Cerrar sesión</a>

</body>
</html>