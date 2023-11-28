<?php
require_once "conexion.php";
require "../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductosModel
{
    // MÉTODO PARA CARGAR PRODUCTOS DESDE ARCHIVO EXCEL
    public static function mdlCargaProductos($file_productos)
    {
        // OBTENER EL NOMBRE TEMPORAL DEL ARCHIVO CARGADO
        $nombreArchivo = $file_productos['tmp_name'];

        // CARGAR EL ARCHIVO EXCEL USANDO LA BIBLIOTECA PHPSPREADSHEET
        $documento = IOFactory::load($nombreArchivo);
        $hojaProductos = $documento->getSheetByName("Productos");
        $productosRegistrados = 0;

        // RECORRER LAS FILAS DEL ARCHIVO EXCEL A PARTIR DE LA FILA 2 (LA PRIMERA FILA SUELE SER ENCABEZADOS)
        for ($i = 2; $i <= $hojaProductos->getHighestDataRow(); $i++) {
            // Obtener los valores de cada celda en la fila actual
            $nombre_producto = $hojaProductos->getCell("A" . $i)->getValue();
            $cod_interno = $hojaProductos->getCell("B" . $i)->getValue();
            $cod_externo = $hojaProductos->getCell("C" . $i)->getValue();
            $nombre_categoria = $hojaProductos->getCell("D" . $i)->getValue();
            $id_proveedor = $hojaProductos->getCell("E" . $i)->getValue();
            $estado = $hojaProductos->getCell("F" . $i)->getValue();
            $imagen = $hojaProductos->getCell("G" . $i)->getValue();

            // VERIFICAR QUE LOS VALORES NECESARIOS NO ESTÉN VACÍOS
            if (
                !empty($cod_interno) && !empty($nombre_producto) && !empty($cod_externo) &&
                !empty($nombre_categoria) && !empty($id_proveedor) && !empty($estado)
            ) {
                // OBTENER EL ID DE LA CATEGORÍA Y EL PROVEEDOR USANDO MÉTODOS AUXILIARES
                $id_categoria = self::mdlBuscarIdCat($nombre_categoria);
                $id_proveedor = self::mdlBuscarIdProv($id_proveedor);

                // VERIFICAR SI LA CATEGORÍA FUE ENCONTRADA
                if ($id_categoria && $id_proveedor) {
                    // Consulta SQL para insertar el producto en la base de datos
                    $stmt = Conexion::conectar()->prepare("INSERT INTO productos(nombre_producto, cod_interno, cod_externo, id_categoria, id_proveedor, estado, imagen)
                                                         VALUES(:nombre_producto, :cod_interno, :cod_externo, :id_categoria, :id_proveedor, :estado, :imagen);");

                    // Asociar los valores a los parámetros de la consulta SQL
                    $stmt->bindParam(":nombre_producto", $nombre_producto, PDO::PARAM_STR);
                    $stmt->bindParam(":cod_interno", $cod_interno, PDO::PARAM_INT);
                    $stmt->bindParam(":cod_externo", $cod_externo, PDO::PARAM_STR);
                    $stmt->bindParam(":id_categoria", $id_categoria['id_categoria'], PDO::PARAM_INT);
                    $stmt->bindParam(":id_proveedor", $id_proveedor['id_proveedor'], PDO::PARAM_INT);
                    $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
                    $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);

                    // EJECUTAR LA CONSULTA SQL
                    if ($stmt->execute()) {
                        // INCREMENTAR EL CONTADOR DE PRODUCTOS REGISTRADOS
                        $productosRegistrados++;
                    } else {
                        
                    }
                } else {                   
                    echo "Error: Categoría o Proveedor no encontrados para el producto en la fila $i.";
                }
            } else {
                echo "Error: Uno o más valores son nulos o vacíos en la fila $i.";
            }
        }

        // PREPARAR LA RESPUESTA CON LA CANTIDAD TOTAL DE PRODUCTOS REGISTRADOS
        $respuesta["totalProductos"] = $productosRegistrados;
        return $respuesta;
    }

    // MÉTODO PARA BUSCAR EL ID DE UNA CATEGORÍA POR SU NOMBRE
    public static function mdlBuscarIdCat($nombreCategoria)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = :nombreCategoria");
        $stmt->bindParam(":nombreCategoria", $nombreCategoria, PDO::PARAM_STR);
        $stmt->execute();

        // Devolver el resultado como un array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // MÉTODO PARA BUSCAR EL ID DE UN PROVEEDOR POR SU NOMBRE
    public static function mdlBuscarIdProv($nombreProveedor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_proveedor FROM proveedores WHERE nombre_proveedor = :nombreProveedor");
        $stmt->bindParam(":nombreProveedor", $nombreProveedor, PDO::PARAM_STR);
        $stmt->execute();

        // Devolver el resultado como un array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // MÉTODO PARA LISTAR PRODUCTOS EN DATATABLE
    static public function mdlListarProductos()
    {
        $stmt = Conexion::conectar()->prepare('call listar_productos');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // MÉTODO PARA REGISTRO DEL PRODUCTO
    static public function mdlRegistrarProducto(
        $nombre_producto,
        $cod_interno,
        $cod_externo,
        $id_categoria,
        $id_proveedor,

    ) {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO productos(nombre_producto, cod_interno,
            cod_externo, id_categoria, id_proveedor) VALUES(:nombre_producto, :cod_interno,
            :cod_externo, :id_categoria, :id_proveedor)");

            $stmt->bindParam(":nombre_producto", $nombre_producto, PDO::PARAM_STR);
            $stmt->bindParam(":cod_interno", $cod_interno, PDO::PARAM_INT);
            $stmt->bindParam(":cod_externo", $cod_externo, PDO::PARAM_STR);
            $stmt->bindParam(":id_categoria", $id_categoria, PDO::PARAM_STR);
            $stmt->bindParam(":id_proveedor", $id_proveedor, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada' . $e->getMessage() . "\n";
        }
        return $resultado;
        $stmt = null;
    }

    //METODO EDITAR PRODUCTO
    static public function mdlActualizarProducto($table, $data, $id, $nameId)
    {
        //var_dump($data);
        $set = "";
        foreach ($data as $key => $value) {
            $set .= $key . " = :" . $key . ",";
        }
        $set = rtrim($set, ',');

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");
            foreach ($data as $key => $value) {
                $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
            }
            $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "error: " . $e->getMessage();
        }
    }

    //METODO ELIMINAR PRODUCTO
    static public function mdlEliminarProducto($table, $id, $nameId)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt -> bindParam(":".$nameId, $id, PDO::PARAM_INT);

        if($stmt->execute()){
            return 'ok';;
        }else{
            return Conexion::conectar()->errorInfo();
        }
    }
}
