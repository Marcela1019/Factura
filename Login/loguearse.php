<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    session_start();

    if(isset($_POST['loguearse'])){
        require_once("LoginUser.php");

        $credenciales = new LoginUser();

        $credenciales->setEmail($_POST['email']);
        $credenciales->setPassword($_POST['password']);

        $login = $credenciales -> login();

        if($login){
            header('location:../Home/home.php');
        }
        else{
            echo "<script> alert ('password  E-mail invalido!!! ');document.location='loginRegister.php'</script>"; 
        }
    }


?>