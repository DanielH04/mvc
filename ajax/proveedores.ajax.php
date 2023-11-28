<?php
require_once "../controllers/proveedores.controller.php";
require_once "../models/proveedores.model.php";

class AjaxProveedores
{

    public $idProveedores;
    public $proveedor;

    public function ajaxListarProveedores()
    {
        $proveedores = proveedoresController::ctrListarProveedores();
        echo json_encode($proveedores, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxGuardarProveedor($accion)
    {
        $guardarProveedor = ProveedoresController::ctrGuardarProveedor($accion, $this->idProveedores, $this->proveedor);
        echo json_encode($guardarProveedor, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxEliminarProveedor()
    {
        $table = "proveedores";
        $id = $_POST["id_proveedor"];
        $nameId = "id_proveedor";

        $eliminarProveedor = proveedoresController::ctrEliminarProveedor($table, $id, $nameId);
        echo json_encode($eliminarProveedor);
    }
}

if (isset($_POST['idProveedor']) && $_POST['idProveedor'] > 0) {

    $editarProveedor = new AjaxProveedores();
    $editarProveedor->idProveedores = $_POST['idProveedor'];
    $editarProveedor->proveedor = $_POST['proveedor'];
    $editarProveedor->ajaxGuardarProveedor(0);
}else if (isset($_POST['idProveedor']) && $_POST['idProveedor'] == 0) {

    $registrarProveedor = new AjaxProveedores();
    $registrarProveedor->idProveedores = $_POST['idProveedor'];
    $registrarProveedor->proveedor = $_POST['proveedor'];
    $registrarProveedor->ajaxGuardarProveedor(1);
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 1){
    $eliminarProveedor = new AjaxProveedores();
    $eliminarProveedor->ajaxEliminarProveedor();

}else {

    $listaCategorias = new AjaxProveedores();
    $listaCategorias->ajaxListarProveedores();
}
