<?php

require_once "conexion.php";

class rolModel{
    static public function mdlObtenerRoles(){
        $stmt = Conexion::conectar()->prepare("SELECT r.id_rol,
                                                      r.rol,
                                                      r.estado,
                                                      '' AS opciones
                                                      FROM roles r
                                                      ORDER BY r.id_rol");
        $stmt ->execute();
        return $stmt->fetchAll();
    }
}