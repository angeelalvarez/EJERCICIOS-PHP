<?php
    session_name('BatSignal');

    session_set_cookie_params(
        0, //Tiempo de vida
        '/', //Disponible en todo el sitio web
        'localhost', //Dominio
        false, //En producción hanría que ponerlo a true (HTTPS)
        true //No pueda acceder a la cookie con Javascript
    );

    session_start();
?>