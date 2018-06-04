<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Hyperion</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/png" href="../IMG/hyperion1.png">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<?php
		session_name("hyperion");
		session_start();

		$co = mysqli_connect('localhost', 'root', '', 'hyperion');

		$gameid = $_GET["valor"];

		$query = mysqli_query($co, "SELECT * FROM `juegos` WHERE id = $gameid");
    	$tab = mysqli_fetch_row($query);

    	$_SESSION["idjuego"] = $tab[0];
    	$_SESSION["imagenjuego"] = $tab[1];
    	$_SESSION["nomjuego"] = $tab[2];
    	$_SESSION["lanzamiento"] = $tab[3];

	?>
	

	<header>
		<div id="container2">
			<input id="menu_trigger" type="checkbox" />
  			<label for="menu_trigger">
  				<div class="icon">
			      <div class="bar first"></div>
			      <div class="bar second"></div>
			      <div class="bar third"></div>
			    </div>
			  </label>
			<div class="menu">
			    <label for="menu_trigger">
			      <div class="bar first"></div>
			      <div class="bar second"></div> 
			    </label>
			    <ul>
			      <a href="principal.php"><li class="mn">Inicio</li></a>
			      <a href="juegos.php"><li class="mn">Juegos</li></a>
			      <a href="salas.php"><li class="mn">Salas</li></a>
			      <a href="resenas.php"><li class="mn">Reseñas</li></a>
			    </ul>
			</div>
			<a href="principal.php"><img id="logo" src="../IMG/hyperion1.png"></a>
			<h1 id="titulopagina">Hyperion</h1>
			<div id="search" style="display: flex;background-color: #06346f;">
				<form action="busqueda.php" method="post" style="display: flex;">
					<input id="search" type="text" name="buscar" placeholder="Buscar...">
					<span style="height: 30px; width: 30px; padding: 1px;background-color: #06346f; border-radius: 0px 5px 5px 0px">
						<button type="submit" style="background-color: #06346f; color: white;margin-top: 5px;"><i style="" class="fa fa-search"></i></button>
					</span>
				</form>
			</div>
			<nav id="navegador">
				<ul>
					<a href="juegos.php"><li><div class="lista">Juegos</div></li></a>
					<a href="salas.php"><li><div class="lista">Salas</div></li></a>
					<a href="resenas.php"><li><div class="lista">Reseñas</div></li></a>
				</ul>
			</nav>
			<div><a href="perfil.php"><img id="profile" src="../IMG/<?php echo $_SESSION['fotoperfil'];?>"></a></div>
			<div><a href="index.php"><h4 id="language">Salir</h4></a></div>
		</div>
	</header>

	<div id="bigcontainer">
		<div id="contgame">
			<div id="imggame">
				<?php
				
					echo '<img id="gamecover" style="float: left;" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['imagenjuego']).' "></a>';


					$queryproceso = mysqli_query($co, "SELECT * FROM juegosproceso jp, usuarios u WHERE $_GET[valor]=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");
					$tabproceso = mysqli_fetch_row($queryproceso);

					if($tabproceso != null){
						echo '<h3 style="text-align: center; color: orange;">Empezado</h3>';
					}else{
						$queryfuturo = mysqli_query($co, "SELECT * FROM juegosfuturo jf, usuarios u WHERE $_GET[valor]=jf.id_juego && 
		    				u.id=jf.id_usuario && u.id='$_SESSION[id]'");
						$tabfuturo = mysqli_fetch_row($queryfuturo);

						if($tabfuturo != null){
							echo '<h3 style="text-align: center; color: deepskyblue;">Futurible</h3>';
						}else{
							$queryfinal = mysqli_query($co, "SELECT * FROM juegosfinalizados jf, usuarios u WHERE $_GET[valor]=jf.id_juego && 
		    				u.id=jf.id_usuario && u.id='$_SESSION[id]'");
		    				$tabfinal = mysqli_fetch_row($queryfinal);

		    				if($tabfinal == null){
		    					echo '<h3 style="text-align: center; color: grey;">Sin empezar</h3>';
		    				}else{
		    					echo '<h3 style="text-align: center; color: #29a845;">Completado</h3>';
		    				}
						}
					}
				?>

			</div>
			<div id="infogame">
				<div id="part1game">
					<div id="namegame"><h1><?php echo $_SESSION['nomjuego'];?></h1></div>
				</div>
				<div id="part2game">
					<div id="namegame"><h3>Lanzamiento: <?php echo $_SESSION['lanzamiento'];?></h3></div>
				</div>
				<div id="part3game">
					<input type="button" class="roombutton" id="botonsala" name="crearsala" value="Crear Sala" onclick="window.location='crearsala.php'">
					<input type="button" class="roombutton" id="botonsala" name="versala" value="Ver Salas" onclick="window.location='salasjuego.php?valor=<?php echo $gameid;?>';">
				</div>
				<?php

					$queryproceso = mysqli_query($co, "SELECT * FROM juegosproceso jp, usuarios u WHERE $_GET[valor]=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");
					$tabproceso = mysqli_fetch_row($queryproceso);

					if($tabproceso != null){
						echo '<div id="part3game" style="display: flex; justify-content: space-between; flex-wrap: wrap;">';
						echo '<input type="button" class="roombutton" id="botonfin" name="finalizar" value="Finalizar" onclick="window.location=`insertarfinalizado.php`;">';
						echo '</div>';
					}else{
						$queryfuturo = mysqli_query($co, "SELECT * FROM juegosfuturo jf, usuarios u WHERE $_GET[valor]=jf.id_juego && 
		    				u.id=jf.id_usuario && u.id='$_SESSION[id]'");
						$tabfuturo = mysqli_fetch_row($queryfuturo);

						if($tabfuturo != null){
							echo '<div id="part3game" style="display: flex; justify-content: space-between; flex-wrap: wrap;">';
							echo '<input type="button" class="roombutton" id="botonempezar" name="empezar" value="Empezar" onclick="window.location=`insertarempezar.php`;">';
							echo '</div>';
						}else{
							$queryfinal = mysqli_query($co, "SELECT * FROM juegosfinalizados jf, usuarios u WHERE $_GET[valor]=jf.id_juego && 
		    				u.id=jf.id_usuario && u.id='$_SESSION[id]'");
		    				$tabfinal = mysqli_fetch_row($queryfinal);

		    				if($tabfinal == null){
		    					echo '<div id="part3game" style="display: flex; justify-content: space-between; flex-wrap: wrap;">';
								echo '<input type="button" class="roombutton" id="botonempezar" name="empezar" value="Empezar" onclick="window.location=`insertarempezar.php`;">';
								echo '<input type="button" class="roombutton" id="botonfuturo" name="futurible" value="Futurible" onclick="window.location=`insertarfuturo.php`;">';
								echo '</div>';
		    				}
						}
					}
				
				?>
				<div id="part4game">
					<form action="resenausu.php" method="post">
					<textarea width="100%" name="resenausu" cols="80" rows="10" style="border-radius: 5px; padding: 10px;" placeholder="Escribir reseña..."></textarea>
					<input type="submit" class="roombutton" id="publicar" name="versala" value="Publicar">
				</div>
				
			</div>
		</div>
	</div>


</body>
</html>