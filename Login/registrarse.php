<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
    if (isset($_POST['registrarse'])){
        require_once("RegisterUser.php");

        $registro = new Registro ();

        $registro->setId_usuario(2);
        $registro->setEmail($_POST['email']);
        $registro->setUsername($_POST['username']);
        $registro->setPassword($_POST['password']);

        $registro->inserData();

        echo "<script>alert ('Los datos fueron guardados satisfactoriamente'); document.location='loginRegister.php' </script>";

    }

?>