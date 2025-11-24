<?php
    require_once 'config_sesion.php';
    require_once 'no_logueado.php';
    require_once 'inactividad.php';
    //Consultado a BD 
    $gadgets_disp = ['Batarang', 'Ganzúa Láser', 'Bomba de Humo', 'Gel Explosivo', 'Capa Deslizante'];

    $_SESSION['gadgets'] = $_SESSION['gadgets'] ?? [];
    if(isset($_POST['Equipar'])){
        foreach($_POST['gadgets_adds'] as $g){
            $_SESSION['gadgets'][$g] = ($_SESSION['gadgets'][$g] ?? 0) + 1;
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
    <h1>Equipa el Batmóvil</h1>
    <h1>Gadgets Disponibles</h1>
    <form action="" method="post">
        <?php foreach($gadgets_disp as $g):?><br>
        <label for="<?= $g ?>">
            <input type="checkbox" name="gadgets_adds[]" id="<?= $g ?>" value = "<?= $g ?>">
            <?= $g ?>
        </label>
        <?php endforeach; ?><br>
        <input type="submit" value="Equipar" name= "Equipar">
    </form>
    <h1>Elementos añadidos</h1>
    <?php var_dump($_SESSION['gadgets']); ?>
</body>
</html>
