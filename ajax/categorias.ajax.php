<?php
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxCategorias
{

    public $idCategoria;
    public $categoria;

    public function ajaxListarCategorias()
    {
        $categorias = categoriasController::ctrListarCategorias();
        echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxGuardarcategoria($accion){
        $guardarCategorias = categoriasController::ctrGuardarCategoria($accion, $this->idCategoria, $this->categoria);
        echo json_encode($guardarCategorias, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxEliminarCategoria()
    {
        $table = "categorias";
        $id = $_POST["id_categoria"];
        $nameId = "id_categoria";

        $eliminarCategoria = categoriasController::ctrEliminarCategoria($table, $id, $nameId);
        echo json_encode($eliminarCategoria);
    }
}

if(isset($_POST['idCategoria']) && $_POST['idCategoria'] > 0){

    $editarCategoria = new AjaxCategorias();
    $editarCategoria->idCategoria = $_POST['idCategoria'];
    $editarCategoria->categoria = $_POST['categoria'];
    $editarCategoria->ajaxGuardarCategoria(0);

}else if(isset($_POST['idCategoria']) && $_POST['idCategoria'] == 0){

    $registrarCategoria = new AjaxCategorias();
    $registrarCategoria->idCategoria = $_POST['idCategoria'];
    $registrarCategoria->categoria = $_POST['categoria'];
    $registrarCategoria->ajaxGuardarCategoria(1);

}else if(isset($_POST['accion']) && $_POST['accion'] == 1){ 
    $eliminarCategoria = new AjaxCategorias();
    $eliminarCategoria->ajaxEliminarCategoria();

}else{

    $listaCategorias = new AjaxCategorias();
    $listaCategorias->ajaxListarCategorias();

}


