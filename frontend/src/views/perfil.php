<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./frontend/src/styles/perfil.css">
</head>

<body>

    <header>
        <nav>
            <a href="index.php?ruta=perfil"> Perfil</a>
            <a href="index.php?ruta=home"> Home </a>
            <a href="index.php?ruta=registro">Registrarse</a>
            <a href="index.php?ruta=iniciarsesion">Iniciar Sesión</a>
            <a href="index.php?ruta=logout"> Salir </a>
            <div class="animation start-home"></div>
        </nav>
    </header>

    <div class="container">
        <div class="card">
        <div class="contenedor-imagen">
    <img
        src="./frontend/src/multimedia/default.png" alt="Foto de perfil" />
    </div>
            <div class="panel-body">
            <h3 class="card_name1"><b>Nombre:</b><br> <?php echo $_SESSION["nombre"]; ?></h3>
                <h3 class="card_name2"><b>Email:</b><br> <?php echo $_SESSION["email"]; ?></h3>
    <a class="btn draw-border" href="index.php?ruta=logout">Cerrar Sesión</a>

            </div>
        </div>
    </div>

</body>
</html>