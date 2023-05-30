<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
 
    require_once ("../conexion/conexion.php");

    class Config extends Conexion {

        private $id;
        private $categoriaNombre;
        private $descripcion;
        private $imagen;

    

        public function __construct($id=0, $categoriaNombre="", $descripcion="",$imagen="", $dbCnx=""){
            $this->id=$id;
            $this->categoriaNombre=$categoriaNombre;
            $this->descripcion=$descripcion;
            $this->imagen=$imagen;
            parent::__construct($dbCnx);

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

    class Clientes extends Conexion{
        private $id;
        private $clienteNombre;
        private $celular;
        private $compañia;

        public function __construct($id=0, $clienteNombre="", $celular="",$compañia="", $dbCnx=""){
            $this->id=$id;
            $this->clienteNombre=$clienteNombre;
            $this->celular=$celular;
            $this->compañia=$compañia;
            parent::__construct($dbCnx);
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
    class Empleado extends Conexion{
        private $id;
        private $empleadoNombre;
        private $celular;
        private $direccion;
        private $imagen;

        public function __construct($id=0, $empleadoNombre="", $celular="",$direccion="", $imagen="", $dbCnx=""){
            $this->id=$id;
            $this->empleadoNombre=$empleadoNombre;
            $this->celular=$celular;
            $this->direccion=$direccion;
            $this->direccion=$imagen;
            parent::__construct($dbCnx);
        }


        public function setId($id){
            $this->id=$id;

        }
        public function getId(){
            return $this->id;
        }
        
        public function setEmpleadoNombre($empleadoNombre){
            $this->empleadoNombre=$empleadoNombre;

        }
        public function getEmpleadoNombre(){
            return $this->empleadoNombre;
        }
        public function setCelular($celular){
            $this->celular=$celular;

        }
        public function getCelular(){
            return $this->celular;
        }
        public function setDireccion($direccion){
            $this->direccion=$direccion;

        }
        public function getDireccion(){
            return $this->direccion;
        }

        public function setImagen($imagen){
            $this->imagen=$imagen;

        }
        public function getImagen(){
            return $this->imagen;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO empleado(empleadoNombre, celular, direccion, imagen) values(?,?,?,?)");
                $stm -> execute ([$this->empleadoNombre, $this->celular, $this->direccion,  $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }
        public function obtainAll(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT * FROM empleado"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }
        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM empleado WHERE id = ?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                echo "<script> alert('Registro Eliminado');document.location='empleado.php'</script>"; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleado WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE empleado SET empleadoNombre = ?, celular = ?, direccion = ?, imagen=? WHERE id=?");
                $stm->execute([$this->empleadoNombre, $this->celular, $this->direccion, $this->imagen, $this->id]);
    
    
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class Factura extends Conexion{
        private $id;
        private $id_empleado;
        private $id_cliente;
        private $fecha;

        public function __construct($id=0, $id_empleado="", $id_cliente="",$fecha="", $dbCnx=""){
            $this->id=$id;
            $this->id_empleado=$id_empleado;
            $this->id_cliente=$id_cliente;
            $this->fecha=$fecha;
            parent::__construct($dbCnx);
       }


        public function setId($id){
            $this->id=$id;

        }
        public function getId(){
            return $this->id;
        }
        
        public function setId_empleado($id_empleado){
            $this->id_empleado=$id_empleado;

        }
        public function getId_empleado(){
            return $this->id_empleado;
        }
        public function setId_cliente($id_cliente){
            $this->id_cliente=$id_cliente;

        }
        public function getId_cliente(){
            return $this->id_cliente;
        }
        public function setFecha($fecha){
            $this->fecha=$fecha;

        }
        public function getFecha(){
            return $this->fecha;
        }


        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO factura(id_empleado, id_cliente, fecha) values(?,?,?)");
                $stm -> execute ([$this->id_empleado, $this->id_cliente, $this->fecha]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }
        public function obtainAll(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT factura.id, clientes.clienteNombre, empleado.empleadoNombre, factura.fecha FROM factura INNER JOIN clientes ON factura.id_cliente = clientes.id INNER JOIN empleado ON factura.id_empleado = empleado.id"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }

        public function obtaintEmpleado(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT id, empleadoNombre FROM empleado"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }

        public function obtaintCliente(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT id, clienteNombre FROM clientes"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }
        
        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM factura WHERE id = ?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                echo "<script> alert('Registro Eliminado');document.location='factura.php'</script>"; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM factura WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE factura SET id_empleado = ?, id_cliente = ?, fecha = ? WHERE id=?");
                $stm->execute([$this->id_empleado, $this->id_cliente, $this->fecha, $this->id]);
    
    
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class Proveedores extends Conexion{
        private $id;
        private $nombreProveedor;
        private $telefono;
        private $ciudad;

        public function __construct($id=0, $nombreProveedor="", $telefono="",$ciudad="",$dbCnx=""){
            $this->id=$id;
            $this->nombreProveedor=$nombreProveedor;
            $this->telefono=$telefono;
            $this->ciudad=$ciudad;
            parent::__construct($dbCnx);
        }


        public function setId($id){
            $this->id=$id;

        }
        public function getId(){
            return $this->id;
        }
        
        public function setNombreProveedor($nombreProveedor){
            $this->nombreProveedor=$nombreProveedor;

        }
        public function getNombreProveedor(){
            return $this->nombreProveedor;
        }
        public function setTelefono($telefono){
            $this->telefono=$telefono;

        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function setCiudad($ciudad){
            $this->ciudad=$ciudad;

        }
        public function getCiudad(){
            return $this->ciudad;
        }


        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO proveedor(nombreProveedor, telefono, ciudad) values(?,?,?)");
                $stm -> execute ([$this->nombreProveedor, $this->telefono, $this->ciudad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }
        public function obtainAll(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT * FROM proveedor"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }
        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM proveedor WHERE id = ?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                echo "<script> alert('Registro Eliminado');document.location='proveedor.php'</script>"; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM proveedor WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE proveedor SET nombreProveedor = ?, telefono = ?, ciudad = ? WHERE id=?");
                $stm->execute([$this->nombreProveedor, $this->telefono, $this->ciudad, $this->id]);
    
    
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    class Productos extends Conexion{
        private $id;
        private $nombreproducto;
        private $precioUnitario;
        private $unidadesPedidas;
        private $stock;
        private $id_categoria;
        private $id_proveedor; 
        private $descontinuado;

        public function __construct($id=0, $nombreproducto="", $precioUnitario="",$unidadesPedidas="", $stock="", $id_categoria="", $id_proveedor="", $descontinuado="", $dbCnx=""){
            $this->id=$id;
            $this->nombreproducto=$nombreproducto;
            $this->precioUnitario=$precioUnitario;
            $this->unidadesPedidas=$unidadesPedidas;
            $this->stock=$stock;
            $this->id_categoria=$categoriaNombre;
            $this->id_proveedor=$id_proveedor;
            $this->descontinuado=$descontinuado;
            parent::__construct($dbCnx);
       }


        public function setId($id){
            $this->id=$id;

        }
        public function getId(){
            return $this->id;
        }
        
        public function setNombreproducto($nombreproducto){
            $this->nombreproducto=$nombreproducto;

        }
        public function getNombreproducto(){
            return $this->nombreproducto;
        }
        public function setPrecioUnitario($precioUnitario){
            $this->precioUnitario=$precioUnitario;

        }
        public function getPrecioUnitario(){
            return $this->precioUnitario;
        }
        public function setUnidadesPedidas($unidadesPedidas){
            $this->unidadesPedidas=$unidadesPedidas;

        }
        public function getUnidadesPedidas(){
            return $this->unidadesPedidas;
        }

        public function setStock($stock){
            $this->stock=$stock;

        }
        public function getStock(){
            return $this->stock;
        }

        public function setId_categoria($id_categoria){
            $this->id_categoria=$id_categoria;

        }
        public function getId_categoria(){
            return $this->id_categoria;
        }

        public function setId_proveedor($id_proveedor){
            $this->id_proveedor=$id_proveedor;

        }
        public function getId_proveedor(){
            return $this->id_proveedor;
        }

        public function setDescontinuado($descontinuado){
            $this->descontinuado=$descontinuado;

        }
        public function getDescontinuado(){
            return $this->descontinuado;
        }


        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO productos(nombreproducto, precioUnitario, unidadesPedidas, stock, id_categoria, id_proveedor, descontinuado) values(?,?,?,?,?,?,?)");
                $stm -> execute ([$this->nombreproducto, $this->precioUnitario, $this->unidadesPedidas, $this->stock, $this->id_categoria, $this-> id_proveedor, $this->descontinuado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }
        public function obtainAll(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT productos.id, productos.nombreproducto, productos.precioUnitario, productos.unidadesPedidas, productos.stock, categorias.id_categoria, proveedor.id_proveedor, productos.descontinuado FROM productos INNER JOIN categorias ON productos.id_categoria = categorias.id INNER JOIN proveedor ON productos.id_proveedor = proveedor.id"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }

        public function obtainCategoria(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT id, categoriaNombre FROM categorias"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }

        public function obtaintProveedor(){
            try {
                $stm = $this -> dbCnx->prepare("SELECT id, nombreProveedor FROM proveedor"); // Metodos nativos del PDO
                $stm -> execute();
                return $stm -> fetchAll(); //retorna todos los registros de la tabla
    
    
            } catch (Exception $e) { // captura el error
                return $e->getMessage();
            }
        }
        
        public function delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM productos WHERE id = ?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                echo "<script> alert('Registro Eliminado');document.location='productos.php'</script>"; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM productos WHERE id=?");
                $stm->execute([$this->id]);
                return $stm->fetchAll();
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE productos SET nombreproducto = ?, precioUnitario = ?, unidadesPedidas = ?, stock= ?, id_categoria= ?, id_proveedor= ?, descontinuado= ? WHERE id=?");
                $stm->execute([$this->nombreproducto, $this->precioUnitario, $this->unidadesPedidas, $this->id, $this->stock, $this->id_categoria, $this->id_proveedor, $this->descontinuado]);
    
    
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

?>


