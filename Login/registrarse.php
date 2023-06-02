<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
    if (isset($_POST['registrarse'])){
        require_once("RegisterUser.php");

        $registro = new RegistroUser();

        $registro->setId_usuario(1);
        $registro->setEmail($_POST['email']);
        $registro->setUsername($_POST['username']);
        $registro->setPassword($_POST['password']);


        /* echo "<script>alert ('Los datos fueron guardados satisfactoriamente'); document.location='../Home/home.php' </script>"; */

        if($registro->checkUser($_POST['email'])){
            echo "<script>alert('Usuario ya existe');document.location='loginRegister.php'</script>";
         }else{
            $registro->insertData();
            echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='../Home/home.php'</script>";
        
         }

    }

?>

