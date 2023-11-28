<?php

require_once "conexion.php";

class moduloModel
{
    static public function mdlObtenerModulos()
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_modulo AS id,
                                                      modulo AS text,
                                                      vista
                                                      FROM modulos m
                                                      ORDER BY m.orden");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function mdlObtenerModulosRol($id_rol)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_modulo as id,
                                                  modulo AS TEXT, 
                                                  IFNULL(CASE WHEN (m.vista IS NULL or m.vista = '') THEN '0' ELSE (
                                                  (SELECT '1' FROM rol_modulo rm WHERE rm.id_modulo = m.id_modulo AND rm.id_rol = :id_rol)) END,0) AS sel
                                                  from modulos m
                                                  order by m.orden");

        $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function mdlObtenerModulosSistema()
    {
        $stmt = Conexion::conectar()->prepare("SELECT '' AS opciones,
                                                      id_modulo,
                                                      orden,
                                                      modulo,
                                                      vista,
                                                      icon_menu
                                                      FROM modulos m
                                                      ORDER BY m.orden");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    static public function mdlReorganizarModulos($modulos_ordenados)
    {
        $total_registros = 0;

        foreach ($modulos_ordenados as $modulo) {
            $array_item_modulo = explode(";", $modulo);

            $stmt = Conexion::conectar()->prepare("UPDATE modulos
                                               SET orden = :p_orden
                                               WHERE id_modulo = :p_id_modulo");

            $stmt->bindParam(":p_id_modulo", $array_item_modulo[0], PDO::PARAM_INT);
            $stmt->bindParam(":p_orden", $array_item_modulo[1], PDO::PARAM_INT);

            if ($stmt->execute()) {
                $total_registros = $total_registros + 1;
            } else {
                $total_registros = 0;
            }
        }

        return $total_registros;
    }
}
