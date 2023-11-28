<?php

require_once "../controllers/template.controller.php";
require_once "../models/template.model.php";

class AjaxTemplate
{

    public function getDatosTemplate()
    {
        $datos = TemplateController::ctrGetDatosTemplate();

        echo json_encode($datos);
    }
}


$datos = new AjaxTemplate();
$datos->getDatosTemplate();
