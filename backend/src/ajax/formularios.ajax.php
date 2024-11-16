<?php
require_once "../controllers/formulariosController.php";
require_once "../models/formulariosModel.php";

class AjaxFormularios
{
    public $validarEmail;
    public function ajaxValidarEmail()
    {
        $item = "email";
        $valor = $this->validarEmail;
        $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["validarEmail"])) {
    $valEmail = new AjaxFormularios();

    $valEmail->validarEmail = $_POST["validarEmail"];

    $valEmail->ajaxValidarEmail();
}
