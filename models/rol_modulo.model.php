<?php

require_once "conexion.php";

class RolModuloModel{
    static public function mdlRegistrarRolModulo($array_idModulos, $idRol, $id_modulo_inicio){
        $total_registros = 0;

        if($idRol == 1){
            $stmt = Conexion::conectar()->prepare("DELETE FROM rol_modulo WHERE id_rol = :id_rol AND id_modulo != 8");
        }else{
            $stmt = Conexion::conectar()->prepare("DELETE FROM rol_modulo WHERE id_rol = :id_rol");
        }

        $stmt -> bindParam(":id_rol", $idRol, PDO::PARAM_INT);
        $stmt -> execute();

        foreach($array_idModulos as $value) {
            if($idRol == 1 && $value == 8){
                $total_registros = $total_registros + 0;
            }else{
                if($value == $id_modulo_inicio){
                    $vista_modulo = 1;
                }else{
                    $vista_modulo = 0;
                }

                $stmt = Conexion::conectar()->prepare("INSERT INTO rol_modulo(id_rol,
                                                                              id_modulo,
                                                                              vista_modulo,
                                                                              estado)
                                                                    VALUES(:id_rol,
                                                                           :id_modulo,
                                                                           :vista_modulo,
                                                                           1)");
                $stmt -> bindParam(":id_rol", $idRol,PDO::PARAM_INT);
                $stmt -> bindParam(":id_modulo", $value,PDO::PARAM_INT);
                $stmt -> bindParam(":vista_modulo", $vista_modulo,PDO::PARAM_INT);

                if($stmt->execute()){
                    $total_registros = $total_registros + 1;
                }else{
                    $total_registros = 0;
                }
            }
        }
        return $total_registros;

    }
}