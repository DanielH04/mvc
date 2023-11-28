<?php
class RolModuloController{
    
    static public function ctrRegistrarRolModulo($array_idModulos, $idRol, $id_modulo_inicio){
        $registroRolModulo = RolModuloModel::mdlRegistrarRolModulo($array_idModulos, $idRol, $id_modulo_inicio);

        return $registroRolModulo;
    }
}