<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("../config.php");

    $config = new Empleado();

    $config->setEmpleadoNombre($_POST['empleadoNombre']);
    $config->setCelular($_POST['celular']);
    $config->setDireccion($_POST['direccion']);
    $config->setImagen($_POST['imagen']);
    
    $config->insertData();

    echo "<script>alert ('Los datos fueron guardados satisfactoriamente'); document.location='empleado.php' </script>";
}

?>