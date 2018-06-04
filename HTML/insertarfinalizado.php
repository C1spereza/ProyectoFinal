<?php

    session_name("hyperion");
    session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');

    $queryproceso = mysqli_query($co, "SELECT jp.id FROM juegosproceso jp, usuarios u WHERE $_SESSION[idjuego]=jp.id_juego && 
	u.id=jp.id_usuario && u.id='$_SESSION[id]'");
	$tabproceso = mysqli_fetch_row($queryproceso);


	$querydelete = mysqli_query($co, "DELETE FROM juegosproceso WHERE id=$tabproceso[0]");

	$query = mysqli_query($co, "INSERT INTO `juegosfinalizados` (id_juego, id_usuario) VALUES ('$_SESSION[idjuego]', '$_SESSION[id]')");

	$querynoticia = mysqli_query($co, "INSERT INTO `noticias` (id_usuario, noticia) VALUES ('$_SESSION[id]', 'Has finalizado $_SESSION[nomjuego]')");

	header("Location: juego.php?valor=$_SESSION[idjuego]");

    mysqli_close($co);



?>