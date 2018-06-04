<!DOCTYPE html>
<html>
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
			<!-- <div><a href="perfil.html"><img id="profile" src="../IMG/profile.jpg"></a></div> -->
			<div><a href="perfil.php"><img id="profile" src="../IMG/<?php echo $_SESSION['fotoperfil'];?>"></a></div>
			<div><a href="index.php"><h4 id="language">Salir</h4></a></div>
		</div>
	</header>

	<div id="bigcontainer">
		<div class="cont">
			<div id="name">
				<h2>Mis noticias</h2>
			</div>
			<?php
				
				$co = mysqli_connect('localhost', 'root', '', 'hyperion');

				$querynewscount = mysqli_query($co, "SELECT COUNT(id) FROM `noticias` WHERE '$_SESSION[id]' = id_usuario");
				$tabnews = mysqli_fetch_row($querynewscount);

				$querynews = mysqli_query($co, "SELECT * FROM `noticias` WHERE '$_SESSION[id]' = id_usuario ORDER BY(id) DESC LIMIT 6");

				if($tabnews[0] < 1){
					echo '<div class="news"><h3>Todavía no hay noticias</h3></div>';
				}else{
					while($news = mysqli_fetch_array($querynews)){
						echo '<div class="news"><h3>'.$news["noticia"].'</h3></div>';
					}
				}

			?>
		</div>
		<div class="cont1">
			<div id="process">
				<div id="name1">
					<h2>En proceso</h2>
				</div>
				<div class="games">
					
					<?php
						
						

						$querycont = mysqli_query($co, "SELECT COUNT(j.imagen) FROM juegos j, juegosproceso jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");
						$tab = mysqli_fetch_row($querycont);

						

		    			$query = mysqli_query($co, "SELECT j.imagen, j.id FROM juegos j, juegosproceso jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]' LIMIT 10");

		    			if($tab[0] < 1){
		    				echo "Todavía no has empezado ningún juego.";
		    			}else{

							while($juego = mysqli_fetch_array($query)){
								echo '<a href="juego.php?valor=' .$juego['id']. '"><img class="game" src="data:image/jpeg;base64,'.base64_encode( $juego['imagen']).' "></a>';
							}
						}

					?>

				</div>

				<a class="all" href="juegosproceso.php">Ver todos</a>
			</div>
			<div id="future">
				<div id="name2">
					<h2>Futuros</h2>
				</div>
				<div class="games">

					<?php
						
						$co = mysqli_connect('localhost', 'root', '', 'hyperion');

						$querycont = mysqli_query($co, "SELECT COUNT(j.imagen) FROM juegos j, juegosfuturo jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]'");
						$tab = mysqli_fetch_row($querycont);

						

		    			$query = mysqli_query($co, "SELECT j.imagen, j.id FROM juegos j, juegosfuturo jp, usuarios u WHERE j.id=jp.id_juego && 
		    				u.id=jp.id_usuario && u.id='$_SESSION[id]' LIMIT 5");

		    			if($tab[0] < 1){
		    				echo "Todavía no has marcado ningún juego como futurible.";
		    			}else{

							while($juego = mysqli_fetch_array($query)){
								echo '<a href="juego.php?valor=' .$juego['id']. '"><img class="gamef" src="data:image/jpeg;base64,'.base64_encode( $juego['imagen']).' "></a>';
							}
						}

					?>

				</div>
				<a class="allf" href="juegosfuturos.php">Ver todos</a>
			</div>
		</div>
	</div>

</body>
</html>