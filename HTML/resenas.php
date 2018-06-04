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
			<div><a href="perfil.php"><img id="profile" src="../IMG/<?php echo $_SESSION['fotoperfil'];?>"></a></div>
			<div><a href="index.php"><h4 id="language">Salir</h4></a></div>
		</div>
	</header>

	<div id="bigcontainer">
		<div id="controom">

			<?php

				$co = mysqli_connect('localhost', 'root', '', 'hyperion');

				$query = mysqli_query($co, "SELECT * FROM `resenas`");


    			while($resena = mysqli_fetch_array($query)){


    				$querys = mysqli_query($co, "SELECT j.imagen FROM juegos j, resenas r WHERE '$resena[id_juego]'=j.id");
    				$tab = mysqli_fetch_row($querys);

    				$queryuser = mysqli_query($co, "SELECT * FROM usuarios u, resenas r WHERE '$resena[id_usuario]'=u.id");
    				$tabuser = mysqli_fetch_row($queryuser);

    				echo '<div class="room" style="height: auto !important;">';
    				echo '<div style="padding-top: 20px; padding-bottom: 20px;">
    					  <img style="border-radius: 55px; float: left;" height="70px" width="70px" src="../IMG/'.$tabuser[6].'">
    					  <h3 style="float: left; padding-top: 15%;">'.$tabuser[1].'</h3>
    					  </div>';
					echo '<div class="titleroom" style="display: flex; flex-wrap: wrap; padding: 20px 10px;"><span>'.$resena["resena"].'</span></div>';
					echo '<div style="padding-top: 20px; padding-bottom: 20px;"><img class="gamer" src="data:image/jpeg;base64,'.base64_encode( $tab[0]).'"></div>';
					echo '</div>';
				}

			?>

		</div>
	</div>


</body>
</html>