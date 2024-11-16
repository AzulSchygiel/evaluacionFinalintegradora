<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./frontend/src/styles/home.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<header>
<nav>
    <a href="index.php?ruta=home">Home</a>
	<a href="index.php?ruta=perfil"> Perfil </a>
    <a href="index.php?ruta=registro">Registrarse</a>
    <a href="index.php?ruta=iniciarsesion">Iniciar Sesión</a>
	<a href="index.php?ruta=logout"> Salir </a>
    <div class="animation start-home"></div>
</nav>
</header>

<h1>BASE DE DATOS</h1>

<?php
if (!isset($_SESSION["validarIngreso"]) || $_SESSION["validarIngreso"] != "ok") {
    echo '<script>window.location = "index.php?ruta=iniciarsesion";</script>';
    exit();
}

if ($_SESSION["rol"] != 1) {
    echo '<script>
        Swal.fire({
            title: "Acceso Denegado",
            text: "No tienes permisos para acceder a esta sección.",
            icon: "error",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = "index.php?ruta=perfil";
        });
    </script>';
    exit();
}
?>

<table class="tabla">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre de usuario</th>
            <th>Correo Electrónico</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);

    foreach ($usuarios as $key => $value): ?>
        <tr>
            <td><?php echo ($key + 1); ?></td>
            <td><?php echo htmlspecialchars($value["nombre"]); ?></td>
            <td><?php echo htmlspecialchars($value["email"]); ?></td>
            <td><?php echo $value["rol"] == 1 ? "Administrador" : "Usuario"; ?></td>
            <td>
                <div class="botonesbbdd">
                    <a href="index.php?ruta=editar&id=<?php echo $value["id"]; ?>" class="boton_editar">Editar</a>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">
                        <button type="submit" class="boton_borrar">Borrar</button>
                    </form>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarRegistro'])) {
                    $eliminar = new ControladorFormularios();
                    $eliminar->ctrEliminarRegistro();
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

</section>
</body>
</html>