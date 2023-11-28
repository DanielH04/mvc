<?php

class TemplateController
{
    static public function ctrGetDatosTemplate()
    {

        $datos = TemplateModel::mdlctrGetDatosTemplate();
        return $datos;
    }
}
