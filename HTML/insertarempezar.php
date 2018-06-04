<?php

    session_name("hyperion");
    session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');

    $queryfuturo = mysqli_query($co, "SELECT jf.id FROM juegosfuturo jf, usuarios u WHERE $_SESSION[idjuego]=jf.id_juego && 
	u.id=jf.id_usuario && u.id='$_SESSION[id]'");
	$tabfuturo = mysqli_fetch_row($queryfuturo);

	if($tabfuturo != null){

		$querydelete = mysqli_query($co, "DELETE FROM juegosfuturo WHERE id=$tabfuturo[0]");

		$query = mysqli_query($co, "INSERT INTO `juegosproceso` (id_juego, id_usuario) VALUES ('$_SESSION[idjuego]', '$_SESSION[id]')");

		$querynoticia = mysqli_query($co, "INSERT INTO `noticias` (id_usuario, noticia) VALUES ('$_SESSION[id]', 'Has empezado a jugar $_SESSION[nomjuego]')");

		header("Location: juego.php?valor=$_SESSION[idjuego]");

	}else{

		$query = mysqli_query($co, "INSERT INTO `juegosproceso` (id_juego, id_usuario) VALUES ('$_SESSION[idjuego]', '$_SESSION[id]')");

		$querynoticia = mysqli_query($co, "INSERT INTO `noticias` (id_usuario, noticia) VALUES ('$_SESSION[id]', 'Has empezado a jugar a $_SESSION[nomjuego]')");

    	header("Location: juego.php?valor=$_SESSION[idjuego]");
	}

    mysqli_close($co);



?>