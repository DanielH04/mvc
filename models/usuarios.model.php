<?php
require_once "conexion.php";

class UsuariosModel
{
    static public function mdlListarUsuarios()
    {
        $stmt = Conexion::conectar()->prepare('call listar_usuarios');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlGuardarusuario($accion, $usuario, $id_rol, $pasusuario)
    {
        $resultado = "";
        try {
            if ($accion > 0) { // REGISTRAR USUARIO
                $hashedPassword = password_hash($pasusuario, PASSWORD_DEFAULT);

                $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(usuario, id_rol, password_usuario) VALUES(:usuario, :id_rol, :password_usuario)");
                $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
                $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
                $stmt->bindParam(":password_usuario", $hashedPassword, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $resultado = "Se registró el usuario correctamente";
                } else {
                    $resultado = "Error al registrar el usuario";
                }
            } else { // MODIFICAR USUARIO
                $stmt = Conexion::conectar()->prepare("UPDATE usuarios
                                                         SET usuario = :usuario,
                                                             id_rol = :id_rol,
                                                             password_usuario = :password_usuario

                                                         WHERE id_usuario = :idUsuario");
                //$stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
                $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
                $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
                $stmt->bindParam(":password_usuario", $pasusuario, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $resultado = "El usuario se actualizó correctamente";
                } else {
                    $resultado = "Error al actualizar el usuario";
                }
            }
        } catch (Exception $e) {
            $resultado = "Error: " . $e->getMessage();
        } finally {
            if ($stmt) {
                $stmt = null;
            }
        }
        return $resultado;
    }

    static public function mdlIniciarSesion($usuario, $password)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * 
                                        FROM usuarios u
                                        INNER JOIN roles r
                                            ON u.id_rol = r.id_rol
                                        INNER JOIN rol_modulo rm
                                            ON rm.id_rol = u.id_rol
                                        INNER JOIN modulos m
                                            ON m.id_modulo = rm.id_modulo
                                        WHERE u.usuario = :usuario
                                        AND u.password_usuario = :password
                                        AND vista_modulo = 1");

        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);

    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    static public function mdlMenuUsuario($id_usuario){
        $stmt = Conexion::conectar()->prepare("SELECT m.id_modulo, m.modulo, m.icon_menu, m.vista, rm.vista_modulo
                                               FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id_rol
                                               INNER JOIN rol_modulo rm ON rm.id_rol = r.id_rol
                                               INNER JOIN modulos m ON m.id_modulo = rm.id_modulo
                                               WHERE u.id_usuario = :id_usuario
                                               ORDER BY m.orden");
        
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }
}
