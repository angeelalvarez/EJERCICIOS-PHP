<?php 
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dia = $_POST['num'];

    switch($dia){
        case 1:
            echo "LUNES";
            break;
        case 2:
            echo "MARTES";
            break;
        case 3:
            echo "MIÉRCOLES";
            break;
        case 4:
            echo "JUEVES";
            break;
        case 5:
            echo "VIERNES";
            break;
        case 6:
            echo "SÁBADO";
            break;
        case 7:
            echo "DOMINGO";
            break;
        default:
            echo "No coincide con ningún día de la semana";
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
            Introduce un número:
            <input type="text" name="num" id="num"><br>
        </label>
        <input type="submit" value="Transformar">
    </form>
</body>
</html>