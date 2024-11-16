<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO FINAL UTN</title>
</head>

<?php
        if (isset($_GET["ruta"])) {
            if (
                $_GET["ruta"] == "registro" ||
                $_GET["ruta"] == "iniciarsesion" ||
                $_GET["ruta"] == "home" ||
                $_GET["ruta"] == "perfil" ||
                $_GET["ruta"] == "editar" ||
                $_GET["ruta"] == "logout"
            ) {
                include "views/" . $_GET["ruta"] . ".php";
            } else {
                include "views/error404.php";
            }
        } else {
            include "views/registro.php";
        }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="./js/code.js"></script>

</body>
</html>