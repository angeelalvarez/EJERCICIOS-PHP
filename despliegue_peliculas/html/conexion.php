<?php

define('SERVER', 'pgsql:host=postgres_db;dbname=peliculas');
define('USER', 'usuario');
define('PASS', 'oretania');

function conectar():PDO|null{
    try {
        $con = new PDO(SERVER,USER,PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $con;
    } catch (PDOException $e) {
        echo "Error de conexión".$e->getMessage();
        return null;
    }
}