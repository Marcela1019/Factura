<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once ('../conexion/conexion.php');
require_once ('../conexion/db.php');


class LoginUser extends Conexion{

    private $id;
    private $email;
    private $password;

    public function __construct($id=0,$email="", $password="",$dbCnx=""){
        $this->id=$id;
        $this->email=$email;
        $this->password=$password;

        parent::__construct($dbCnx);

    }

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }


    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }


    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function fetchAll(){
        try {
            $stm = $this -> dbCnx->prepare("SELECT * FROM registro");
            $stm -> execute();
            return $stm -> fetchAll(); //retorna todos los registros de la tabla


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login(){
        try {
            $stm =$this ->dbCnx->prepare("SELECT * FROM registro WHERE email=? AND password=?");
            $stm -> execute([$this->email, md5($this->password)]);
            $user = $stm ->fetchAll();
            if (count($user)>0){
                session_start();
                $_SESSION['id']=$user[0]['id']; 
                $_SESSION['email']=$user[0]['email']; 
                $_SESSION['password']=$user[0]['password'];
                $_SESSION['username']=$user[0]['username'];
                return true; 
            }
            else{
                false;
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>