<?php
class moduloController
{

    static public function ctrObtenerModulos()
    {
        $modulos = moduloModel::mdlObtenerModulos();
        return $modulos;
    }

    static public function ctrObtenerModulosRol($id_rol)
    {
        $modulosPorRol = moduloModel::mdlObtenerModulosRol($id_rol);

        return $modulosPorRol;
    }

    static public function ctrObtenerModulosSistema()
    {
        $modulosSistema = moduloModel::mdlObtenerModulosSistema();
        return $modulosSistema;
    }

    static public function ctrReorganizarModulos($modulos_ordenados)
    {
        $modulosOrdenados = moduloModel::mdlReorganizarModulos($modulos_ordenados);
        return $modulosOrdenados;
    }
}
