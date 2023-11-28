<?php

require_once "../controllers/rol_modulo.controller.php";
require_once "../models/rol_modulo.model.php";

class AjaxRolModulo{
    public function ajaxRegistrarRolModulo($array_idModulos, $idRol, $id_modulo_inicio){
        $registroRolModulo = RolModuloController::ctrRegistrarRolModulo($array_idModulos, $idRol, $id_modulo_inicio);
        echo json_encode($registroRolModulo);
    }
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){
    //var_dump($_POST);
    $registroRolModulo = new AjaxRolModulo;
    $registroRolModulo->ajaxRegistrarRolModulo($_POST['id_modulosSeleccionados'], $_POST['id_rol'], $_POST['id_modulo_inicio']);
}