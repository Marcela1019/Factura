<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("../config.php");

    $config = new Productos();

    $config->setNombreproducto($_POST['nombreproducto']);
    $config->setPrecioUnitario($_POST['precioUnitario']);
    $config->setUnidadesPedidas($_POST['unidadesPedidas']);
    $config->setStock($_POST['stock']);
    $config->setId_categoria($_POST['id_categoria']);
    $config->setId_proveedor($_POST['id_proveedor']);
    $config->setDescontinuado($_POST['descontinuado']);

    $config->insertData();

    echo "<script>alert ('Los datos fueron guardados satisfactoriamente'); document.location='producto.php' </script>";
}

?>