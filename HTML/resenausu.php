<?php

    session_name("hyperion");
    session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');


    $query = mysqli_query($co, "INSERT INTO `resenas` (id_usuario, id_juego, resena) VALUES 
            ('$_SESSION[id]', '$_SESSION[idjuego]', '$_REQUEST[resenausu]')");

    header("Location: juego.php?valor=$_SESSION[idjuego]");

    mysqli_close($co);



?>