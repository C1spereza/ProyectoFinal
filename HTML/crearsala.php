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
						<button type="submit" style="background-color: #06346f; color: white;margin-top: 5px;"><i class="fa fa-search"></i></button>
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
				
					echo '<img id="gamecover" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['imagenjuego']).' "></a>';
				?>

			</div>
			<div id="infogame">
				<div id="part1game">
					<div id="namegame"><h1>Creación de la sala</h1></div>
				</div>
				<div id="part4game">
					<form action="creacionsala.php" method="post">
						<input type="text" style="float: left; margin-top: 20px; margin-bottom: 20px; padding: 10px; width: 50%; border-radius: 6px;" name="roomname" placeholder="Nombre de la sala" required>
						<textarea width="100%" name="commentusu" cols="80" rows="10" style="border-radius: 5px; padding: 10px;" placeholder="Escribe el primer comentario de la sala..."></textarea>
						<input type="submit" class="roombutton" id="publicar" style="margin-top: 20px;" name="crearsala" value="Crear">
					</form>
				</div>
				
			</div>
		</div>
	</div>


</body>
</html>