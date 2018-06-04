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
		<div id="contgamerooms">
			<div id="imggame">
				<?php

					$co = mysqli_connect('localhost', 'root', '', 'hyperion');
					$roomid = $_GET["sala"];
					$_SESSION['room'] = $roomid;


					$queryimage = mysqli_query($co, "SELECT j.imagen FROM juegos j, salas s WHERE s.id=$roomid and s.id_juego=j.id");
					$result = mysqli_fetch_row($queryimage);

					echo '<img id="gamecover" src="data:image/jpeg;base64,'.base64_encode( $result[0]).' "></a>';
				
				?>

			</div>
			<div class="controomgame">
				<div id="name">
					<?php

						$query = mysqli_query($co, "SELECT * FROM `salas` WHERE id = $roomid");
						$tab = mysqli_fetch_row($query);

						$_SESSION['game'] = $tab[1];

						echo '<h2>'.$tab[2].'</h2>';
					?>
				</div>
				<form action="comentar.php" method="post">
					<textarea name="comentariousuario" rows="5" class="textareacomentario" placeholder="Escribe tus opiniones..."></textarea>
					<input type="submit" id="publicar" style="width: 200px; height: 30px; float: right; cursor: pointer; margin-right: 20px; margin-top: 10px; margin-bottom: 10px;" value="Comentar"></input>
				</form>
				<?php

					$querycoment = mysqli_query($co, "SELECT * FROM `comentarios` WHERE id_sala = $roomid ORDER BY id DESC");

			    	while($comentroom = mysqli_fetch_array($querycoment)){
			    		$user = $comentroom["id_usuario"];

			    		$queryuser = mysqli_query($co, "SELECT * FROM `usuarios` WHERE id = $user");
			    		$tab2 = mysqli_fetch_row($queryuser);

			    		echo '<div class="commentuser">';

			    		echo '<div class="commentprofileuser">';
			    		echo '<img class="profilecomment" src="../IMG/'.$tab2[6].'" height="70px" width="70px">';
			    		echo '<h3>'.$tab2[1].'</h3>';
			    		echo '</div>';
						echo '<div class="comments"><h3>'.$comentroom['comentario'].'</h3></div>';

						echo '</div>';
					}

				?>
				<?php
				?>
			</div>
		</div>
	</div>


</body>
</html>