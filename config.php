<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
 
    require_once ("db.php");

    class Config{

        private $id;
        private $categoriaNombre;
        private $descripcion;
        private $imagen;

        protected $dbCnx;

        public function __construct($id=0, $categoriaNombre="", $descripcion="",$imagen=""){
            $this->id=$id;
            $this->categoriaNombre=$categoriaNombre;
            $this->descripcion=$descripcion;
            $this->imagen=$imagen;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }
        
        public function setId($id){
            $this->id=$id;

        }
        public function getId(){
            return $this->id;
        }
        
        public function setCategoriaNombre($categoriaNombre){
            $this->categoriaNombre=$categoriaNombre;

        }
        public function getCategoriaNombre(){
            return $this->categoriaNombre;
        }
        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;

        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function setImagen($imagen){
            $this->imagen=$imagen;

        }
        public function getImagen(){
            return $this->imagen;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO categorias(categoriaNombre, descripcion, imagen) values(?,?,?)");
                $stm -> execute ([$this->categoriaNombre, $this->descripcion, $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }
        public function obtainAll(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT * FROM categorias"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }
        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM categorias WHERE id = ?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                echo "<script> alert('Registro Eliminado');document.location='categoria.php'</script>"; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM categorias WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE categorias SET categoriaNombre = ?, descripcion = ?, imagen = ? WHERE id=?");
                $stm->execute([$this->categoriaNombre, $this->descripcion, $this->imagen, $this->id]);
    
    
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

    class Clientes{
        private $id;
        private $clienteNombre;
        private $celular;
        private $compañia;

        protected $dbCnx;

        public function __construct($id=0, $clienteNombre="", $celular="",$compañia=""){
            $this->id=$id;
            $this->clienteNombre=$clienteNombre;
            $this->celular=$celular;
            $this->compañia=$compañia;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }


        public function setId($id){
            $this->id=$id;

        }
        public function getId(){
            return $this->id;
        }
        
        public function setClienteNombre($clienteNombre){
            $this->clienteNombre=$clienteNombre;

        }
        public function getClienteNombre(){
            return $this->clienteNombre;
        }
        public function setCelular($celular){
            $this->celular=$celular;

        }
        public function getCelular(){
            return $this->celular;
        }
        public function setCompañia($compañia){
            $this->compañia=$compañia;

        }
        public function getCompañia(){
            return $this->compañia;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO clientes(clienteNombre, celular, compañia) values(?,?,?)");
                $stm -> execute ([$this->clienteNombre, $this->celular, $this->compañia]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }
        public function obtainAll(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT * FROM clientes"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }
        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE id = ?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                echo "<script> alert('Registro Eliminado');document.location='clientes.php'</script>"; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE clientes SET clienteNombre = ?, celular = ?, compañia = ? WHERE id=?");
                $stm->execute([$this->clienteNombre, $this->celular, $this->compañia, $this->id]);
    
    
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>


