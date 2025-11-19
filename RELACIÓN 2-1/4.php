<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $n = $_POST['nota'];

        if($n >= 90 && $n <= 100){
            echo "A";
        }elseif($n >= 80 && $n < 90){
            echo "B";
        }elseif($n >= 70 && $n < 80){
            echo "C";
        }elseif($n >= 60 && $n < 70){
            echo "D";
        }elseif($n < 60){
            echo "  F";
        }else{
            echo "No es una nota válida";
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
        <label for="nota">
            Introduce tu nota:
            <input type="text" name="nota" id="nota"><br>
        </label>
        <input type="submit" value="Convertir">
    </form>
</body>
</html>