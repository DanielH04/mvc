<?php
class categoriasController
{
    static public function ctrListarCategorias()
    {
        $categorias = CategoriasModel::mdlListarCategorias();
        return $categorias;
    }

    static public function ctrGuardarCategoria($accion, $idCategoria, $categoria)
    {
        $guardarCategoria = CategoriasModel::mdlGuardarCategoria($accion, $idCategoria, $categoria);
        return $guardarCategoria;
    }

    static public function ctrEliminarCategoria($accion, $idCategoria, $categoria)
    {
        $eliminarCategoria = CategoriasModel::mdlEliminarCategoria($accion, $idCategoria, $categoria);
        return $eliminarCategoria;
    }
}
 