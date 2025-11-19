<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['num'];
        if($numero > 0){
            echo "Es un número positivo";
        }elseif($numero < 0){
            echo "El número es negativo";
        }else{
            echo "El número es 0";
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
        <label for="num">
            Introduce un numero:
            <input type="text" name="num" id="num"><br>
        </label>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>