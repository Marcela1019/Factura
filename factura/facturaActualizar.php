<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

// Primer paso--------------------------------------
  require_once ('../config.php');
  $data = new Factura();

  $id = $_GET['id'];
  $data -> setId($id);

  $record = $data->selectOne();
  //print_r($record);

  $value = $record[0];

  echo"<br>";
  echo"<br>";
  //print_r($value);

// Segundo paso-----------------------------------

if(isset($_POST['editar'])){

  $data->setId_empleado($_POST['id_empleado']);
  $data->setCelular($_POST['celular']);
  $data->setId_cliente($_POST['id_cliente']);
  $data->setFecha($_POST['fecha']);
  
  $data->update();

  echo "<script> alert ('Datos Actualizados!!! ');document.location='factura.php'</script>"; 
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Empleado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/stylos.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Super Marker.</h3>
        <img src="../imagen/imagen.png" alt="" class="imagenPerfil">
        <h3 >Marcela Betancourt</h3>
      </div>
      <div class="menus">
        <a href="home.html" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Home</h3>
        </a>
        <a href="empleado.php" style="display: flex;gap:2px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;">Factura</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Factura a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="id_empleado" class="form-label">Nombre Empleado</label>
                <input 
                  type="text"
                  id="id_empleado"
                  name="id_empleado"
                  class="form-control"  
                  value="<?php echo $value['id_empleado']; ?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="id_cliente" class="form-label">Nombre Cliente</label>
                <input 
                  type="number"
                  id="id_cliente"
                  name="id_cliente"
                  class="form-control"  
                  value="<?php echo $value['id_cliente']; ?>"
                  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="fecha" class="form-label">Fecha</label>
                <input 
                  type="text"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                  value="<?php echo $value['fecha']; ?>"
                  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="EDITAR" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Factura</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>