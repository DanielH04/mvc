<?php

require_once "../controllers/rol.controller.php";
require_once "../models/rol.model.php";

class ajaxRoles
{

    public function ajaxObtenerRoles()
    {
        $roles = rolController::ctrObtenerRoles();
        echo json_encode($roles);
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) {
    $roles = new ajaxRoles;
    $roles->ajaxObtenerRoles();
}
