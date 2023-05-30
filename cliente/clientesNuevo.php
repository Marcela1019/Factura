<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("../config.php");

    $config = new Clientes();

    $config->setClienteNombre($_POST['clienteNombre']);
    $config->setCelular($_POST['celular']);
    $config->setCompañia($_POST['compañia']);
    
    $config->insertData();

    echo "<script>alert ('Los datos fueron guardados satisfactoriamente'); document.location='clientes.php' </script>";
}

?>