<?php

require_once "conexion.php";

class TemplateModel
{
    static public function mdlctrGetDatosTemplate()
    {
        $stmt = conexion::conectar()->prepare('call datos_inicio');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
