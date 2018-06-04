<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Hyperion</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/png" href="../IMG/hyperion1.png">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body id="cuerpo">

	<div id="container">
		<div id="titulo">
			<h1>Hyperion</h1>
		</div>
		<div id="buttons">
			<input type="button" class="boton" id="arriba" value="Login" onclick="formlogin()">
			<input type="button" class="boton" value="Registrarme" onclick="formregister()">
		</div>
	</div>

	<div class="modal" id="login">
		<div class="modal-content">
			<span class="close" onclick="cerrar()">&times;</span>
			<h2 id="titulogin">Login</h2>
			<form action="comprueba.php">
			    <input type="text" name="usuario" id="top" class="datos" placeholder="Usuario">
			    <input type="password" name="passwd" class="datos" placeholder="Contraseña">
			    <input type="checkbox" name="recordar" id="recordarcheck" class="datos" value="recordar"><div id="recordar">Recordarme</div>
			    <input type="submit" name="seguir" id="botonlogin" class="datos" value="Entrar">
			</form>
		</div>
	</div>

	<div class="modal" id="registro">
		<div class="modal-content">
			<span class="close" onclick="cerrar()">&times;</span>
			<h2 id="tituloregistro">Registro</h2>
			<form action="registro.php" enctype="multipart/form-data" method="post">
			    <input type="text" name="usuarioreg" id="top" class="datos" placeholder="Usuario" required>
			    <input type="text" name="nombre" class="datos" placeholder="Nombre" required>
			    <input type="text" name="apellidos" class="datos" placeholder="Apellidos" required>
			    <input type="date" name="fnac" class="datos" placeholder="Fecha de nacimiento" required>
			    <input type="email" name="mail" class="datos" placeholder="Correo electrónico" required>
			    <input type="password" name="passwdreg" class="datos" placeholder="Contraseña" required>
			    <input type="password" name="confpasswd" class="datos" placeholder="Confirmar contraseña" required>
			    <input type="file" name="imagen" class="datos" style="margin-left: 40px !important;" required>
			    <input type="submit" name="acabar" id="botonlogin" class="datos" value="Registrarme">
			</form>

		</div>
	</div>


	<script type="text/javascript">

		function formlogin(){
			document.getElementsByClassName("modal")[0].style.display = "block";
		}

		function formregister(){
			document.getElementsByClassName("modal")[1].style.display = "block";
		}

		function cerrar(){
			document.getElementsByClassName("modal")[0].style.display = "none";
			document.getElementsByClassName("modal")[1].style.display = "none";
			document.getElementsByClassName("datos")[0].value = "";
		    document.getElementsByClassName("datos")[1].value = "";
		    document.getElementsByClassName("datos")[2].checked = false;

		    document.getElementsByClassName("datos")[4].value = "";
		    document.getElementsByClassName("datos")[5].value = "";
		    document.getElementsByClassName("datos")[6].value = "";
		    document.getElementsByClassName("datos")[7].value = "";
		    document.getElementsByClassName("datos")[8].value = "";
		    document.getElementsByClassName("datos")[9].value = "";
		    document.getElementsByClassName("datos")[10].value = "";
		}

		window.onclick = function(event) {
		    if (event.target == document.getElementById('login') || event.target == document.getElementById('registro')) {
		        document.getElementById('login').style.display = "none";
		        document.getElementsByClassName("datos")[0].value = "";
		        document.getElementsByClassName("datos")[1].value = "";
		        document.getElementsByClassName("datos")[2].checked = false;

		        document.getElementById('registro').style.display = "none";
		        document.getElementsByClassName("datos")[4].value = "";
			    document.getElementsByClassName("datos")[5].value = "";
			    document.getElementsByClassName("datos")[6].value = "";
			    document.getElementsByClassName("datos")[7].value = "";
			    document.getElementsByClassName("datos")[8].value = "";
			    document.getElementsByClassName("datos")[9].value = "";
			    document.getElementsByClassName("datos")[10].value = "";
		    }
		}
	</script>


</body>
</html>