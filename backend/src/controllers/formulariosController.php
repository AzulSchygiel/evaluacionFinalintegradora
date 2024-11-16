<?php

class ControladorFormularios
{
    /*---------------- Registro ------------------- */
    static public function ctrRegistro()
    {
        if (isset($_POST["registroNombre"])) {
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
                preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])) {
                $tabla = "registros";
                $datos = array(
                    "nombre" => $_POST["registroNombre"],
                    "email" => $_POST["registroEmail"],
                    "password" => $_POST["registroPassword"],
                     "rol" => 2 //  rol por defecto (usuario)
                );
                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
                return $respuesta;
                
            } else {
                $respuesta = "error";
                return $respuesta;
            }
        }
    }

    static public function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    /*---------------- Iniciar Sesión ------------------- */
    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if ($respuesta && $respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
                $_SESSION["validarIngreso"] = "ok";
                $_SESSION["nombre"] = $respuesta["nombre"];
                $_SESSION["email"] = $respuesta["email"];
                $_SESSION["rol"] = $respuesta["rol"];
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location.href = "index.php?ruta=home";
                </script>';
            } else {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
                echo '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: "Error de inicio de sesión",
                        text: "Email o contraseña incorrectos! Inténtalo de nuevo.",
                        icon: "warning",
                        confirmButtonText: "OK",
                        color: "black",
                        background: "#fff",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "index.php?ruta=iniciarsesion";
                        }
                    });
                </script>
            </body>
            </html>';
        }
    }
}

    // Actualizar registro
    static public function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarNombre"])) {

            if ($_POST["actualizarPassword"] != "") {
                $password = $_POST["actualizarPassword"];
            } else {
                $password = $_POST["passwordActual"];
            }
            $tabla = "registros";
            $datos = array(
                "id" => $_POST["idUsuario"],
                "nombre" => $_POST["actualizarNombre"],
                "email" => $_POST["actualizarEmail"],
                "password" => $password
            );
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location.href = "index.php?ruta=home";
                </script>';
            }
        }
    }

    // Eliminar
    public function ctrEliminarRegistro()
    {
        if (isset($_POST["eliminarRegistro"])) {

            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

            if ($respuesta == "ok") {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location.href = "index.php?ruta=home";
                </script>';
            }
        }
    }
}