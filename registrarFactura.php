<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("config.php");

    $config = new Config ();

    $config->setCategoriaNombre($_POST['categoriaNombre']);
    $config->setDescripcion($_POST['descripcion']);
    $config->setImagen($_POST['imagen']);
    
    $config->insertData();

    echo "<script>alert ('Los datos fueron guardados satisfactoriamente'); document.location='facturacion.php' </script>";
}

?>