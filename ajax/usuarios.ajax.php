<?php
require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsuarios
{

    public $idUsuario;
    public $usuario;
    public $id_rol;
    public $pasusuario;

    public function ajaxListarUsuarios()
    {
        $usuarios = usuariosController::ctrListarUsuarios();
        echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxGuardarusuario($accion){
        $guardarUsuario = usuariosController::ctrGuardarUsuario($accion, $this->idUsuario, $this->usuario, $this->id_rol, $this->pasusuario);
        echo json_encode($guardarUsuario, JSON_UNESCAPED_UNICODE);
    }
}

if(isset($_POST['idUsuario']) && $_POST['idUsuario'] > 0){

    $editarUsuario = new AjaxUsuarios();
    $editarUsuario->idUsuario = $_POST['idUsuario'];
    $editarUsuario->usuario = $_POST['usuario'];
    $editarUsuario->id_rol = $_POST['id_rol'];
    $editarUsuario->pasusuario = $_POST['pasusuario'];
    $editarUsuario->ajaxGuardarusuario(0);

}else if(isset($_POST['idUsuario']) && $_POST['idUsuario'] == 0){

    $registrarUsuario = new AjaxUsuarios();
    $registrarUsuario->idUsuario = $_POST['idUsuario'];
    $registrarUsuario->usuario = $_POST['usuario'];
    $registrarUsuario->id_rol = $_POST['id_rol'];
    $registrarUsuario->pasusuario = $_POST['pasusuario'];
    $registrarUsuario->ajaxGuardarusuario(1);

}else{

    $listaCategorias = new AjaxUsuarios();
    $listaCategorias->ajaxListarUsuarios();

}