<?php

    session_name("hyperion");
    session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');


    $query = mysqli_query($co, "INSERT INTO `juegosfuturo` (id_juego, id_usuario) VALUES ('$_SESSION[idjuego]', '$_SESSION[id]')");

    $querynoticia = mysqli_query($co, "INSERT INTO `noticias` (id_usuario, noticia) VALUES ('$_SESSION[id]', 'Has marcado $_SESSION[nomjuego] para jugar en un futuro')");

    header("Location: juego.php?valor=$_SESSION[idjuego]");

    mysqli_close($co);



?>