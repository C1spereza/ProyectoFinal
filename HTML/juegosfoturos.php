<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hyperion</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/png" href="../IMG/hyperion1.png">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	
	<?php
		session_name("hyperion");
		session_start();
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
			<div id="search"><input id="search" type="text" name="search" placeholder="Buscar..."></div>
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
		<div id="contgames">
			<div id="name">
				<h2>Juegos en proceso</h2>
			</div>

			<div class="games">

				<?php
						$co = mysqli_connect('localhost', 'root', '', 'hyperion');
						

						$querycont = mysqli_query($co, "SELECT COUNT(j.imagen) FROM juegos j, juegosproceso jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");
						$tab = mysqli_fetch_row($querycont);

						

		    			$query = mysqli_query($co, "SELECT j.imagen, j.id FROM juegos j, juegosproceso jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");

		    			if($tab[0] < 1){
		    				echo "Todavía no has empezado ningún juego.";
		    			}else{

							while($juego = mysqli_fetch_array($query)){
								echo '<a href="juego.php?valor=' .$juego['id']. '"><img class="allgame" src="data:image/jpeg;base64,'.base64_encode( $juego['imagen']).' "></a>';
							}
						}

					?>

			</div>

			<div class="ocult">
				<?php
						$co = mysqli_connect('localhost', 'root', '', 'hyperion');
						

						$querycont = mysqli_query($co, "SELECT COUNT(j.imagen) FROM juegos j, juegosproceso jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");
						$tab = mysqli_fetch_row($querycont);

						

		    			$query = mysqli_query($co, "SELECT j.imagen, j.id FROM juegos j, juegosproceso jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");

		    			if($tab[0] < 1){
		    				echo "Todavía no has empezado ningún juego.";
		    			}else{

							while($juego = mysqli_fetch_array($query)){
								echo '<a href="juego.php?valor=' .$juego['id']. '"><img class="gamemobile" src="data:image/jpeg;base64,'.base64_encode( $juego['imagen']).' "></a>';
							}
						}

					?>
			</div>

		</div>
	</div>


</body>
</html>