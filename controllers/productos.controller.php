<?php
require_once "../models/productos.model.php";
class ProductosController
{

    static public function ctrCargarProductos($file_productos)
    {
        $respuesta = ProductosModel::mdlCargaProductos($file_productos);
        return $respuesta;
    }

    static public function ctrListarProductos()
    {
        $productos = ProductosModel::mdlListarProductos();
        return $productos;
    }

    static public function ctrRegistrarProducto($nombre_producto, $cod_interno, $cod_externo, $id_categoria, $id_proveedor)
    {
        $registroProducto = ProductosModel::mdlRegistrarProducto($nombre_producto, $cod_interno, $cod_externo, $id_categoria, $id_proveedor);
        return $registroProducto;
    } 

    static public function ctrActualizarProducto($table, $data, $id, $nameId)
    {
        //var_dump($data);
        $respuesta = ProductosModel::mdlActualizarProducto($table, $data, $id, $nameId);
        return $respuesta;
    }

    static public function ctrEliminarProducto($table, $id, $nameId)
    {
        $respuesta = ProductosModel::mdlEliminarProducto($table, $id, $nameId);
        return $respuesta;
    }
}
