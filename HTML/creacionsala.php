<?php

    session_name("hyperion");
    session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');


    $query = mysqli_query($co, "INSERT INTO `salas` (id_juego, nombresala) VALUES ('$_SESSION[idjuego]', '$_REQUEST[roomname]')");

    if($_REQUEST["commentusu"]){

    	$queryroom = mysqli_query($co, "SELECT * FROM `salas` WHERE nombresala = '$_REQUEST[roomname]' && id_juego = '$_SESSION[idjuego]'");
    	$tabroom = mysqli_fetch_row($queryroom);

    	$querycomment = mysqli_query($co, "INSERT INTO `comentarios` (id_juego, id_sala, id_usuario, comentario) VALUES 
    		('$_SESSION[idjuego]', '$tabroom[0]', '$_SESSION[id]', '$_REQUEST[commentusu]')");
    }


    header("Location: juego.php?valor=$_SESSION[idjuego]");

    mysqli_close($co);



?>