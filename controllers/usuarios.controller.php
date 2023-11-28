<?php
class usuariosController
{
    static public function ctrListarUsuarios()
    {
        $usuarios = UsuariosModel::mdlListarUsuarios();
        return $usuarios;
    }

    static public function ctrGuardarUsuario($accion, $idUsuario, $usuario, $id_rol, $pasusuario)
    {
        $guardarUsuario = UsuariosModel::mdlGuardarUsuario($accion, $idUsuario, $usuario, $id_rol, $pasusuario);
        return $guardarUsuario;
    }

    public function login()
    {
        if (isset($_POST["loginUsuario"])) {
            $usuario = $_POST["loginUsuario"];
            $password = crypt($_POST["loginPassword"], '$2a$07$azybxcags23425sdg23sdfhsd$');
            $respuesta = UsuariosModel::mdlIniciarSesion($usuario, $password);

            if (count($respuesta) > 0) {
                $_SESSION["usuario"] = $respuesta[0];

                echo '
                    <script>
                        window.location = "http://localhost/mvc/";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        fncSweetAlert(
                            "error",
                            "Contraseña o Usuario invalido",
                            "http://localhost/mvc/"
                        );
                    </script>
                ';
            }
        }
    }

    static public function ctrMenuUsuario($id_usuario)
    {
        $menuUsuario = UsuariosModel::mdlMenuUsuario($id_usuario);
        return $menuUsuario;
    }
}
