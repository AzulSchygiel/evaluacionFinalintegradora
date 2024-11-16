/********************MOSTRAR Y OCULTAR LA CONTRASEÑA************************/
const passwordField = document.getElementById("password");
const togglePassword = document.querySelector(".password-toggle-icon i");

togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});

/*********************************AJAX*********************************/ 
$("#email").change(function () {
  $(".alerta").remove();

  let email = $(this).val();

  let datos = new FormData();
  datos.append("validarEmail", email);

  $.ajax({
    url: "ajax/formularios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#email").val("");
        $("#email")
          .parent()
          .after(
            `
          <div class="alerta alerta-advertencia"> <strong> Error: </strong> 
          El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente. </div>
          `
          );
      }
    },
  });
});
