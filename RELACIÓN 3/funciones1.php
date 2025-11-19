<?php
    require_once 'funciones1.1.php';

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        //var_dump($_POST); (te muestra la información de lo que se ha enviado)
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $resultado = sumar($num1,$num2);

        //echo $resultado; (te sale arriba)

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
        <label for="num1">
            Número 1:
            <input type="text" name="num1" id="num1">
        </label><br>

        <label for="num2">
            Número 2:
            <input type="text" name="num2" id="num2">
        </label><br>

        <input type="submit" value="Sumar">
    </form>

    <?php
        if(isset($resultado)) echo "Resultado: $resultado";
    ?>
</body>
</html>