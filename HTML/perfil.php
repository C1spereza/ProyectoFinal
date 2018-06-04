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

	<div id="bigcontainer1">
		<div id="contprofile">
			<div id="fondo">
				<img id="imgprofile" src="../IMG/<?php echo $_SESSION['fotoperfil'];?>">
				<h4>Usuario: <?php echo $_SESSION['usuario'];?></h4>
				<h4>Nombre: <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'];?></h4>
				<h4>Fecha de nacimiento: <?php echo $_SESSION['fechanac'];?></h4>
				<div id="contprof">
					<div id="separation">
					
					</div>
				</div>
				<div id="options">
					<input type="button" class="profilebuttons" value="Completados" onclick="window.location='juegosfinalizados.php';">
					<input type="button" class="profilebuttons" value="En proceso" onclick="window.location='juegosproceso.php';">
				</div>
				<div id="options">
					<input type="button" class="profilebuttons" value="Futuros" onclick="window.location='juegosfuturos.php';">
					<input type="button" class="profilebuttons" value="Reseñas" onclick="window.location='resenausuario.php';">
				</div>
			</div>
		</div>
		<div class="contprof1">
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
	</div>


</body>
</html>