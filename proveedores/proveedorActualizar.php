<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

// Primer paso--------------------------------------
  require_once ('../config.php');
  $data = new Proveedores();

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
  $data->setNombreProveedor($_POST['nombreProveedor']);
  $data->setTelefono($_POST['telefono']);
  $data->setCiudad($_POST['ciudad']);
  
  $data->update();

  echo "<script> alert ('Datos Actualizados!!! ');document.location='proveedor.php'</script>"; 
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Proveedor</title>
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
        <a href="proveedor.php" style="display: flex;gap:2px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;">Proveedores</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Proveedor a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombreProveedor" class="form-label">Nombre Proveedor</label>
                <input 
                  type="text"
                  id="nombreProveedor"
                  name="nombreProveedor"
                  class="form-control"  
                  value="<?php echo $value['nombreProveedor']; ?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="telefono" class="form-label">Telefono</label>
                <input 
                  type="number"
                  id="telefono"
                  name="telefono"
                  class="form-control"  
                  value="<?php echo $value['telefono']; ?>"
                  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input 
                  type="text"
                  id="ciudad"
                  name="ciudad"
                  class="form-control"  
                  value="<?php echo $value['ciudad']; ?>"
                  
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
      <h3>Detalle Proveedor</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>