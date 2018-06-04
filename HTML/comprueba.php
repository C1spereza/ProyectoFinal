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
<?php
	session_name("hyperion");
	session_start();

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');

    $query = mysqli_query($co, "SELECT * FROM `usuarios` WHERE usuario = '$_REQUEST[usuario]'");
    $tab = mysqli_fetch_row($query);

    if($tab == null){
        header('refresh: 3; url=index.php');

        echo "<h3 style='text-shadow: 2px 2px 2px black; color: white; margin-top: 20%; margin-left: 10%;'>Usuario incorrecto. Redireccionando...</h3>";
    }else{

        $cont = hash('sha512', $_REQUEST['passwd']);

        if($tab[2] == $cont){
            $_SESSION["usuario"] = $_REQUEST["usuario"];
            $_SESSION["contrasena"] = $_REQUEST["passwd"];
            $_SESSION["id"] = $tab[0];
            $_SESSION["nombre"] = $tab[3];
            $_SESSION["apellidos"] = $tab[4];
            $_SESSION["fechanac"] = $tab[5];
            $_SESSION["fotoperfil"] = $tab[6];

            header("Location: principal.php");

        }else{
            
            header('refresh: 3; url=index.php');

            echo "<h3 style='text-shadow: 2px 2px 2px black; color: white; margin-top: 20%; margin-left: 10%;'>Contraseña incorrecta. Redireccionando...</h3>";

        }
    }

    mysqli_close($co);


?>
</body>
</html>