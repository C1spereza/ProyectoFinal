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

    $co = mysqli_connect('localhost', 'root', '', 'hyperion');


    $query = mysqli_query($co, "SELECT * FROM `usuarios` WHERE usuario = '$_REQUEST[usuarioreg]'");
    $tab = mysqli_fetch_row($query);



    if($tab != null){
        header('refresh: 3; url=index.php');

        echo "<h3 style='text-shadow: 2px 2px 2px black; color: white; margin-top: 20%; margin-left: 10%;'>Nombre de usuario existente. Redireccionando...</h3>";
    }else{

        $name = $_FILES['imagen']['name'];
        $temp_name = $_FILES['imagen']['tmp_name'];
        $location = '../IMG/';

        $contencriptada = hash('sha512', $_REQUEST['passwdreg']);

        move_uploaded_file($temp_name, $location.$name);

        mysqli_query($co,"INSERT INTO `usuarios` (usuario, passwd, nombre, apellidos, fnacimiento, imagen) VALUES 
            ('$_REQUEST[usuarioreg]', '$contencriptada', '$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[fnac]', '$name')");

        header('refresh: 3; url=index.php');

        echo "<h3 style='text-shadow: 2px 2px 2px black; color: white; margin-top: 20%; margin-left: 10%;'>Usuario registrado con éxito. Redireccionando...</h3>";
    }

    mysqli_close($co);



?>
</body>
</html>