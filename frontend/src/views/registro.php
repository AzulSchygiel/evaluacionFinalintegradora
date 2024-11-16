<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./frontend/src/styles/registro.css">
</head>
<body>
<section>
        <div class="form-box">
                <form method="post" autocomplete="off">
                    <h2>Crear cuenta</h2>
            <div class="inputbox">
                <ion-icon name="contact"></ion-icon>
                <input type="text" id="nombre" name="registroNombre" required>
                <label for="nombre">Nombre de usuario</label>
            </div>
            <div class="inputbox">
                <ion-icon name="mail"></ion-icon>
                <input type="email" id="email" name="registroEmail" required>
                <label for="email">Correo electrónico<span class="obligatory">*</span></label>
            </div>
<script>
        window.onload = function () {
            document.getElementById("nombre").value = localStorage.getItem("nombre") || '';
            document.getElementById("email").value = localStorage.getItem("email") || '';
        };

        document.getElementById("nombre").addEventListener("input", function () {
            localStorage.setItem("nombre", this.value);
        });

        document.getElementById("email").addEventListener("input", function () {
            localStorage.setItem("email", this.value);
        });
</script>
            <div class="inputbox">
                <input type="password" id="password" name="registroPassword" required>
                <label for="pwd">Contraseña<span class="obligatory">*</span></label>
                <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
            </div>

            <?php
$registro = ControladorFormularios::ctrRegistro();
if ($registro == "ok") {
    echo '<script> 
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        setTimeout(function() {
            window.location.href = "index.php?ruta=iniciarsesion";
        });
    </script>';

    echo '<div class="alerta alerta-exito"> El usuario se ha registrado con éxito </div>';
}
if ($registro == "error") {
    echo '<script> 
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>';
    echo '<div class="alerta alerta-danger"> Error, no se permiten caracteres especiales </div>';
}
?>

            <div class="terminos">
                <div data-text-variant="text-xs/normal">Al registrarte, aceptas las <a href="#" rel="noreferrer noopener" target="_blank">Condiciones del Servicio</a></div> y la <a href="#" rel="noreferrer noopener" target="_blank">Política de Privacidad</a> de la página.
            </div>
                    <input type="submit" value="continuar" class="enviar" name="send">
                    <div class="register">
                        <p>Sos usuario? <a  href="index.php?ruta=iniciarsesion">Inicia sesión!</a></p>
                    </div>
                </form>
        </div>
    </section>

<script src="./frontend/src/js/code.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>
