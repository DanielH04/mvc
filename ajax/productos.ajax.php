<?php
require_once "../controllers/productos.controller.php";
require_once "../models/productos.model.php";
require_once "../vendor/autoload.php";

class ajaxProductos
{
    public $file_productos;
    public $nombre_producto;
    public $cod_interno;
    public $cod_externo;
    public $id_categoria;
    public $id_proveedor;

    public function ajaxCargarProductos()
    {
        $respuesta = ProductosController::ctrCargarProductos($this->file_productos);

        echo json_encode($respuesta);
    }

    public function ajaxListarProductos()
    {
        $productos = ProductosController::ctrListarProductos();
        echo json_encode($productos);
    }

    public function ajaxRegistrarProducto()
    {
        $producto = ProductosController::ctrRegistrarProducto($this->nombre_producto, $this->cod_interno, $this->cod_externo, $this->id_categoria, $this->id_proveedor);
        echo json_encode($producto);
    }

    public function ajaxActualizarProducto($data)
    {
        $table = "productos";
        $id = $data["id_producto"];
        $nameId = "id_producto"; 

        $respuesta = ProductosController::ctrActualizarProducto($table, $data, $id, $nameId);
        echo json_encode($respuesta);
    }

    public function ajaxEliminarProducto()
    {
        $table = "productos";
        $id = $_POST["id_producto"];
        $nameId = "id_producto";

        $respuesta = ProductosController::ctrEliminarProducto($table, $id, $nameId);
        echo json_encode($respuesta);
    }
}
if (isset($_POST['accion']) && $_POST['accion'] == 1) { // PARAMETRO PARA LISTAR PRODUCTOS
    $productos = new ajaxProductos();
    $productos->ajaxListarProductos();

} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { // PARAMETRO PARA REGISTRAR PRODUCTOS
    $registrarProducto = new ajaxProductos();
    $registrarProducto->nombre_producto = $_POST["nombre_producto"];
    $registrarProducto->cod_interno = $_POST["cod_interno"];
    $registrarProducto->cod_externo = $_POST["cod_externo"];
    $registrarProducto->id_categoria = $_POST["id_categoria"];
    $registrarProducto->id_proveedor = $_POST["id_proveedor"];
    $registrarProducto->ajaxRegistrarProducto();

} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { // PARAMETRO PARA EDITAR PRODUCTOS
    $id_producto = $_POST["id_producto"];
    $nombre_producto = $_POST["nombre_producto"];
    $cod_interno = $_POST["cod_interno"];
    $cod_externo = $_POST["cod_externo"];
    $id_categoria = $_POST["id_categoria"];
    $id_proveedor = $_POST["id_proveedor"];

    $data = array(
        "id_producto" => $id_producto,
        "nombre_producto" => $nombre_producto,
        "cod_interno" => $cod_interno,
        "cod_externo" => $cod_externo,
        "id_categoria" => $id_categoria,
        "id_proveedor" => $id_proveedor,
    );
    $actualizarProducto = new ajaxProductos();
    $actualizarProducto->ajaxActualizarProducto($data);

} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { //PARAMETRO PARA ELIMINAR PRODUCTO
    $eliminarProducto = new ajaxProductos();
    $eliminarProducto->ajaxEliminarProducto();

} else if (isset($_FILES)) { // PARAMETRO PARA CARGAR ARCHIVO DE PRODUCTOS
    $archivo_productos = new ajaxProductos();
    $archivo_productos->file_productos = $_FILES['file_productos'];
    $archivo_productos->ajaxCargarProductos();
}
