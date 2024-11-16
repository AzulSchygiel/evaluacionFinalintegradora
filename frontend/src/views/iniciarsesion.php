<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./frontend/src/styles/iniciarsesion.css">
    <title>proyecto final</title>
</head>
<body>
    <div class="box">
        <div class="container">
                <span><a href="index.php?ruta=registro" class="new">Registrate aqui</a>
                <h1>Hola!</h1>
            </span>
            <form method="post" autocomplete="off">
            <div class="input-field">
            <input type="" name="ingresoEmail" id="email" placeholder="Correo electrónico"><div class="mailicon"><ion-icon name="mail"></ion-icon></div>
            </div>
<script> //PERSISTENCIA DE DATOS DEL FORMULARIO
window.onload = function () {
document.getElementById("email").value = localStorage.getItem("email") || '';
};

document.getElementById("email").addEventListener("input", function () {
localStorage.setItem("email", this.value);
});
</script>
            <div class="input-field">
            <input type="password" name="ingresoPassword" id="password" placeholder="Contraseña" required>
            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
            </div>

<?php 
		$ingreso = new ControladorFormularios();
		$ingreso -> ctrIngreso();
?>

            <div class="bottom">
                <div class="left">
                    <input type="checkbox"  id="check">
                    <label for="check">Recordar</label>
                </div>
                <div class="right">
                    <label><a href="#">Te olvidaste la contraseña?</a></label>
                </div>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Ingresar" name="send">
            </div>
            <div class="social-login">
            </div>
            </form>
        </div>
    </div>
    <script src="./frontend/src/js/code.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script><!-- PAGINA USADA PARA ICONOS:https://ionic.io/ionicons/v4  --> 
</body>
</html>