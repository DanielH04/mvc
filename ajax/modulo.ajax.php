<?php

require_once "../controllers/modulo.controller.php";
require_once "../models/modulo.model.php";

class ajaxModulos
{
    public function ajaxObtenerModulos()
    {
        $modulos =  moduloController::ctrObtenerModulos();
        echo json_encode($modulos);
    }

    public function ajaxObtenerModulosRol($id_rol)
    {
        $modulosRol = moduloController::ctrObtenerModulosRol($id_rol);
        echo json_encode($modulosRol);
    }

    public function ajaxObtenerModulosSistema()
    {
        $modulosSistema = moduloController::ctrObtenerModulosSistema();
        echo json_encode($modulosSistema);
    }

    public function ajaxReorganizarModulos($modulos_ordenados)
    {
        $modulosOrdenados = moduloController::ctrReorganizarModulos($modulos_ordenados);
        echo json_encode($modulosOrdenados);
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) {
    $modulos = new ajaxModulos;
    $modulos->ajaxObtenerModulos();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) {
    $modulosRol = new ajaxModulos();
    $modulosRol->ajaxObtenerModulosRol($_POST["id_rol"]);

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) {
    $modulosSistema = new ajaxModulos;
    $modulosSistema->ajaxObtenerModulosSistema();
    
} else if (isset($_POST['accion']) && $_POST['accion'] == 4) {
    $organizar_modulos = new ajaxModulos;
    $organizar_modulos->ajaxReorganizarModulos($_POST["modulos"]);
}
