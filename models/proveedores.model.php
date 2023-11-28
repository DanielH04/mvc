<?php
// Incluyendo el archivo de conexión a la base de datos
require_once "conexion.php";

class ProveedoresModel
{
    // Método para listar los proveedores desde la base de datos
    static public function mdlListarProveedores()
    {
        // Preparar la consulta SQL para seleccionar información de proveedores
        $stmt = Conexion::conectar()->prepare("SELECT 
        id_proveedor, 
        nombre_proveedor,
        status_proveedor,
        '' as opciones
        FROM proveedores ORDER BY id_proveedor ASC");

        // Ejecutar la consulta
        $stmt->execute();

        // Devolver todas las filas resultantes como un array de asociativo
        return $stmt->fetchAll();
    }

    // Método para guardar o actualizar información de un proveedor
    static public function mdlGuardarProveedor($accion, $idProveedor, $proveedor)
    {
        // Variable para almacenar el mensaje de resultado de la operación
        $resultado = "";

        // Si $accion es mayor que 0, se registra un nuevo proveedor
        if ($accion > 0) {
            // Preparar la consulta SQL para insertar un nuevo proveedor
            $stmt = Conexion::conectar()->prepare("INSERT INTO proveedores(nombre_proveedor) VALUES(:proveedor)");

            // Asignar valores a los parámetros de la consulta
            $stmt->bindParam(":proveedor", $proveedor, PDO::PARAM_STR);

            // Ejecutar la consulta y verificar si se registró correctamente
            if ($stmt->execute()) {
                $resultado = "Se registró el proveedor correctamente";
            } else {
                $resultado = "Error al registrar el proveedor";
            }
        } else { // Si $accion es 0, se actualiza un proveedor existente
            // Preparar la consulta SQL para actualizar un proveedor
            $stmt = Conexion::conectar()->prepare("UPDATE proveedores
                                                     SET nombre_proveedor = :proveedor 
                                                     WHERE id_proveedor = :idProveedor");

            // Asignar valores a los parámetros de la consulta
            $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_STR);
            $stmt->bindParam(":proveedor", $proveedor, PDO::PARAM_STR);

            // Ejecutar la consulta y verificar si se actualizó correctamente
            if ($stmt->execute()) {
                $resultado = "El proveedor se actualizó correctamente";
            } else {
                $resultado = "Error al actualizar el proveedor";
            }
        }

        // Devolver el mensaje de resultado de la operación
        return $resultado;
        $stmt = null;
    }

     //METODO ELIMINAR PROVEEDOR
     static public function mdlEliminarProveedor($table, $id, $nameId)
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
?>

