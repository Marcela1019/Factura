<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once("../conexion/conexion.php");
require_once("../conexion/db.php");


class Registro extends Conexion{

    private $id;
    private $id_usuario;
    private $email;
    private $username;
    private $password;

    public function __construct($id=0, $id_usuario="",$email="",$username="",$password="",$dbCnx=""){

        $this->id=$id;
        $this->id_usuario=$id_usuario;
        $this->email=$email;
        $this->username=$username;
        $this->password=$password;
        parent::__construct($dbCnx);

    }

    public function setId ($id){
        $this->id =$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    
    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->usuario;
    }

    public function setUsername($username){
        $this->username=$username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setPassword($password){
        $this->password=$password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function inserData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO registro (id_usuario, email, username, password) values (?,?,?,?)");
            $stm -> execute([$this->id_usuario,$this->email,$this->username,$this->password]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>