<?php

    session_name("hyperion");
    session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');


    $query = mysqli_query($co, "INSERT INTO `comentarios` (id_juego, id_sala, id_usuario, comentario) VALUES 
            ('$_SESSION[game]', '$_SESSION[room]', '$_SESSION[id]', '$_REQUEST[comentariousuario]')");
    $tab = mysqli_fetch_row($query);

    header("Location: comentarios.php?sala=$_SESSION[room]");

    mysqli_close($co);



?>