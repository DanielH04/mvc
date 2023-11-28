<?php

class rolController{
    static public function ctrObtenerRoles(){
        $modulos = rolModel::mdlObtenerRoles();

        return $modulos;
    }
}