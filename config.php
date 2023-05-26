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
    }

?>