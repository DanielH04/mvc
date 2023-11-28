<?php
require_once "conexion.php";

class CategoriasModel
{
    static public function mdlListarCategorias()
    {
        $stmt = Conexion::conectar()->prepare("SELECT 
        id_categoria, 
        nombre_categoria,
        status_categoria,
        '' as opciones
        FROM categorias ORDER BY id_categoria ASC");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlGuardarcategoria($accion, $idCategoria, $categoria)
    {

        if ($accion > 0) { //REGISTRAR CATEGORIA

            $stmt = Conexion::conectar()->prepare("INSERT INTO categorias(nombre_categoria) VALUES(:categoria)");

            $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $resultado = "Se registró la categoría correctamente";
            } else {
                $resultado = "Error al registrar la categoría";
            }
        } else { //MODIFICAR CATEGORIA

            $stmt = Conexion::conectar()->prepare("UPDATE categorias
                                                     SET nombre_categoria = :categoria 
                                                     WHERE id_categoria = :idCategoria");

            $stmt->bindParam(":idCategoria", $idCategoria, PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $resultado = "La categoría se actualizó correctamente";
            } else {
                $resultado = "Error al actualizar la categoría";
            }
        }

        return $resultado;
        $stmt = null;
    }

    //METODO ELIMINAR CATEGORIA
    static public function mdlEliminarCategoria($table, $id, $nameId)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt -> bindParam(":".$nameId, $id, PDO::PARAM_INT);

        if($stmt->execute()){
            return 'ok';
        }else{
            return Conexion::conectar()->errorInfo();
        }
    }
}
 