<?php
    require_once("../config.php");//llamos a nuestra clase 

    $record = new Clientes();// la instanciasmos creando un objeto

    if(isset($_GET['id'])&& isset($_GET['req'])){// sentencia de control - isset:identifica que no sea nula el get
        if ($_GET['req']== "delete"){
            $record -> setId($_GET['id']);
            $record -> delete();
            echo "<script>alert ('Dato borrado satisfactoriamenente '); document.location='clientes.php'</script>";
        }
    }
?>