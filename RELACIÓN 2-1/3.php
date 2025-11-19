<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $n1 = $_POST['num1'];
        $n2 = $_POST['num2'];

        if($n1 > $n2){
            echo "El número mayor es $n1";
        }elseif($n1 < $n2){
            echo "El número mayor es $n2";
        }else{
            echo "Los números son iguales";
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
        <label for="num1">
            Número 1:
            <input type="text" name="num1" id="num1"><br>
        </label>
        <label for="num2">
            Número 2:
            <input type="text" name="num2" id="num2"><br>
        </label>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>