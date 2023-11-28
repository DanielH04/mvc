<?php
class proveedoresController
{ 
    static public function ctrListarProveedores()
    {
        $proveedores = ProveedoresModel::mdlListarProveedores();
        return $proveedores;
    }

    static public function ctrGuardarProveedor($accion, $idProveedor, $proveedor)
    {
        $guardarProveedor = ProveedoresModel::mdlGuardarProveedor($accion, $idProveedor, $proveedor);
        return $guardarProveedor;
    }

    static public function ctrEliminarProveedor($accion, $idCategoria, $categoria)
    {
        $eliminarProveedor = ProveedoresModel::mdlEliminarProveedor($accion, $idCategoria, $categoria);
        return $eliminarProveedor;
    }
}
