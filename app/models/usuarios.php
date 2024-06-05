<?php
include_once "app/models/db.class.php";
class usuarios extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

    public function getAll(){
        return $this->executeQuery("Select id_usr, nombres, usuario, tipo from usuarios order by id_usr");
    }

    public function getAllOrderByName(){
        return $this->executeQuery("Select id_usr, nombres, usuario, tipo from usuarios order by nombres");
    }

    public function save($data){
        return $this->executeInsert("Insert into usuarios set usuario='{$data["usuario"]}', password=sha1('{$data["password"]}'), nombres='{$data["nombres"]}', tipo='{$data["tipo"]}'");
    }

    public function getUserByName($user){
        return $this->executeQuery("Select id_usr, nombres, usuario, tipo from usuarios where usuario='{$user}'");
    }

    public function getOneUser($id) {
        return $this->executeQuery("Select id_usr, nombres, usuario, tipo from usuarios where id_usr='{$id}'");
    }

    public function update($data) {
        return $this->executeInsert("UPDATE usuarios 
            SET usuario='{$data["usuario"]}', 
            password=IF('{$data["password"]}'='', password, SHA1('{$data["password"]}')), 
            nombres='{$data["nombres"]}', 
            tipo='{$data["tipo"]}' 
            WHERE id_usr={$data["id_usr"]}");
    }
    

    public function deleteUser ($id) {
        return $this->executeInsert("delete from usuarios where id_usr='$id'");
        
    }
}
