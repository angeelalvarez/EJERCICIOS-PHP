<?php
     if(!isset($_SESSION['user'])){
        header("Location: sesiones2.php");
        exit;
    }
?>