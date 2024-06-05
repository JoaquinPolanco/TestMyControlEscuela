<?php
include_once "app/models/usuarios.php";

class UsuariosController extends Controller {
    private $user;
    public function __construct($parametro) {
        $this->user=new Usuarios();
        parent::__construct("usuarios",$parametro,true);
    }

    public function getAll() {
        $records=$this->user->getAll();
        $info=array('success'=>true, 'records'=>$records);
        echo json_encode($info);
    }
    
    public function save() {
     
        if ($_POST["id_usr"]==0) {
            $datosUser=$this->user->getUserbyName($_POST["usuario"]);
            if (count($datosUser)>0){
                $info=array('success'=>false, 'msg'=>"El usuario ya existe.");
            } else {
                $records=$this->user->save($_POST);
                $info=array('success'=>true, 'msg'=>"Se ha guardado el usuario con éxito.");
            }
        } else {
            $records=$this->user->update($_POST);
            $info=array('success'=>true, 'msg'=>"Se han actualizado los datos del usuario con éxito.");
        }
        echo json_encode($info);
    }

    public function getOneUser() {
        $records=$this->user->getOneUser($_GET["id"]);
        if (count ($records) > 0 ){
            $info=array('success'=>true, 'records'=>$records);
        } else {
            $info=array('success'=>false, 'msg'=>'El usuario no existe.');
        }
        echo json_encode($info);
    }

    public function deleteUser(){
        $records=$this->user->deleteUser($_GET["id"]);
        $info=array('success'=>true, 'msg'=>"Se ha eliminado el usuario con éxito.");
        echo json_encode($info);
    }
}